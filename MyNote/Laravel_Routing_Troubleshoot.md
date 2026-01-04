# Laravel "Not Found" Error - Troubleshooting Guide

## This document document is Copy from windows to wsl by using this command
wsl cp "C:\Users\Administrator\.gemini\antigravity\brain\6bbcf9ae-4efa-4628-ae22-22d0f3ba2c4a\walkthrough.md" /var/www/html/backup/Laravel_Routing_Troubleshoot.md

## Problem Statement

**Issue**: Home page works fine, but all other pages show:
```
Not Found
The requested URL was not found on this server.
Apache/2.4.58 (Ubuntu) Server at localhost Port 80
```

**Pages Affected**:
- `/blog` ❌
- `/login` ❌
- `/register` ❌
- `/article/{slug}` ❌
- All other routes except `/` (home)

---

## Root Cause Analysis

### Step 1: Check Apache Configuration

**Command**:
```bash
wsl cat /etc/apache2/sites-available/000-default.conf
```

**OLD Configuration** (INCORRECT):
```apache
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html    # ❌ WRONG - Points to root directory
    
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

**Problems Identified**:
1. ❌ DocumentRoot points to `/var/www/html` instead of `/var/www/html/public`
2. ❌ No `<Directory>` directive with `AllowOverride All`
3. ❌ `.htaccess` file not being processed

---

### Step 2: Check .htaccess Files

**Command**:
```bash
# Check root .htaccess
cat /var/www/html/.htaccess

# Check public .htaccess
cat /var/www/html/public/.htaccess
``` 

**Found in Root** (`/var/www/html/.htaccess`):
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    RewriteRule ^(.*)$ public/$1 [L]    # Redirects to public folder
</IfModule>
```

**Found in Public** (`/var/www/html/public/.htaccess`):
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]    # ✅ This is correct but not being processed
</IfModule>
```

**Problem**: The `.htaccess` file exists and is correct, but Apache is NOT processing it because `AllowOverride` is not enabled.

---

## Solution Implementation

### Step 1: Update Apache Virtual Host Configuration

**NEW Configuration** (CORRECT):
```apache
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/public    # ✅ CORRECT - Points to public directory

    <Directory /var/www/html/public>     # ✅ NEW - Enable .htaccess processing
        Options Indexes FollowSymLinks
        AllowOverride All                 # ✅ CRITICAL - Allows .htaccess to work
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

**How to Apply** (Option 1 - Using existing script):
```bash
sudo bash /var/www/html/fix_apache.sh
```

**How to Apply** (Option 2 - Manual):
```bash
# Edit the configuration file
sudo nano /etc/apache2/sites-available/000-default.conf

# Paste the NEW configuration above
# Save and exit (Ctrl+X, Y, Enter)
```

---

### Step 2: Enable Apache mod_rewrite Module

**Command**:
```bash
sudo a2enmod rewrite
```

**Expected Output**:
```
Enabling module rewrite.
To activate the new configuration, you need to run:
  service apache2 restart
```

**Why This is Needed**: 
- The `mod_rewrite` module allows Apache to process URL rewriting rules in `.htaccess`
- Laravel routing depends on URL rewriting to route requests to `index.php`

---

### Step 3: Restart Apache Server

**Command**:
```bash
sudo service apache2 restart
```

**Expected Output**:
```
 * Restarting Apache httpd web server apache2    [ OK ]
```

**Alternative Command**:
```bash
sudo systemctl restart apache2
```

---

## Verification Steps

### Test Each Route

1. **Home Page**:
   ```
   URL: http://localhost/
   Expected: ✅ Works (Home page loads)
   ```

2. **Blog Page**:
   ```
   URL: http://localhost/blog
   Expected: ✅ Works (Blog listing page)
   ```

3. **Login Page**:
   ```
   URL: http://localhost/login
   Expected: ✅ Works (Login form)
   ```

4. **Register Page**:
   ```
   URL: http://localhost/register
   Expected: ✅ Works (Registration form)
   ```

5. **Article Pages** (Dynamic Routes):
   ```
   URL: http://localhost/article/{any-slug}
   Expected: ✅ Works (Single article page)
   ```

6. **Category Pages**:
   ```
   URL: http://localhost/category/{category-slug}
   Expected: ✅ Works (Category posts)
   ```

---

## Understanding How It Works

### Before the Fix

```
User Request: http://localhost/blog
         ↓
    Apache receives request
         ↓
    DocumentRoot: /var/www/html  ❌
         ↓
    Looks for: /var/www/html/blog (file/directory)
         ↓
    Not Found! → 404 Error
```

### After the Fix

```
User Request: http://localhost/blog
         ↓
    Apache receives request
         ↓
    DocumentRoot: /var/www/html/public  ✅
         ↓
    Reads .htaccess (AllowOverride All enabled)
         ↓
    URL Rewrite Rule Triggered:
    "If file doesn't exist, send to index.php"
         ↓
    /var/www/html/public/index.php
         ↓
    Laravel Router loads
         ↓
    Matches route: Route::get('/blog', ...)
         ↓
    BlogController@index executes
         ↓
    Page Renders Successfully! ✅
```

---

## Key Concepts Learned

### 1. Laravel Directory Structure
```
/var/www/html/
├── app/              (Application code)
├── config/           (Configuration files)
├── public/           👈 Web server should point HERE
│   ├── index.php     (Entry point)
│   └── .htaccess     (URL rewriting rules)
├── routes/           (Route definitions)
└── .htaccess         (Redirects to public/)
```

### 2. Apache AllowOverride Directive

| Value | Meaning |
|-------|---------|
| `None` | Apache ignores `.htaccess` files completely |
| `All` | Apache processes all directives in `.htaccess` |
| `AuthConfig` | Only authentication directives allowed |
| `FileInfo` | Only file-type directives allowed |

**For Laravel**: Always use `AllowOverride All`

### 3. URL Rewriting Flow

**.htaccess Rules Explained**:
```apache
# Rule 1: If file exists, serve it directly
RewriteCond %{REQUEST_FILENAME} !-f

# Rule 2: If directory exists, serve it directly
RewriteCond %{REQUEST_FILENAME} !-d

# Rule 3: Otherwise, send to index.php
RewriteRule ^ index.php [L]
```

**Example**:
- Request: `/css/app.css` → File exists → Serve directly ✅
- Request: `/blog` → File doesn't exist → Send to `index.php` → Laravel routes it ✅

---

## Common Mistakes to Avoid

### ❌ Mistake 1: Wrong DocumentRoot
```apache
DocumentRoot /var/www/html    # Wrong!
```
**Why Wrong**: Laravel needs to start from the `public/` directory

### ❌ Mistake 2: Missing AllowOverride
```apache
<Directory /var/www/html/public>
    Options Indexes FollowSymLinks
    # Missing: AllowOverride All
    Require all granted
</Directory>
```
**Why Wrong**: `.htaccess` rules won't be processed

### ❌ Mistake 3: mod_rewrite Not Enabled
**Symptom**: Same 404 errors even with correct configuration
**Fix**: `sudo a2enmod rewrite`

### ❌ Mistake 4: Not Restarting Apache
**Why Wrong**: Configuration changes don't take effect until restart

---

## Quick Reference Commands

### Check if mod_rewrite is enabled
```bash
apache2ctl -M | grep rewrite
```
**Expected**: `rewrite_module (shared)`

### Test Apache configuration syntax
```bash
sudo apache2ctl configtest
```
**Expected**: `Syntax OK`

### View Apache error logs
```bash
tail -f /var/log/apache2/error.log
```

### View Apache access logs
```bash
tail -f /var/log/apache2/access.log
```

### Restart Apache (Multiple ways)
```bash
# Method 1
sudo service apache2 restart

# Method 2
sudo systemctl restart apache2

# Method 3
sudo apache2ctl restart
```

---

## Summary of Changes Made

| Component | Old State | New State | Why |
|-----------|-----------|-----------|-----|
| **DocumentRoot** | `/var/www/html` | `/var/www/html/public` | Laravel entry point is in public/ |
| **AllowOverride** | Not configured | `All` | Enable .htaccess processing |
| **Directory Block** | Missing | Added for `/var/www/html/public` | Configure permissions and overrides |
| **mod_rewrite** | May not be enabled | Enabled | Required for URL rewriting |
| **Apache** | Old config | Restarted | Apply configuration changes |

---

## Complete Step-by-Step Solution

Run these commands in order:

```bash
# 1. Edit Apache configuration
sudo nano /etc/apache2/sites-available/000-default.conf

# 2. Replace content with new configuration (shown above)
# Save and exit (Ctrl+X, Y, Enter)

# 3. Enable mod_rewrite
sudo a2enmod rewrite

# 4. Test configuration
sudo apache2ctl configtest

# 5. Restart Apache
sudo service apache2 restart

# 6. Test your application
# Open browser: http://localhost/blog
```

---

## Troubleshooting After Fix

### If still getting 404 errors:

**Check 1**: Verify DocumentRoot
```bash
grep DocumentRoot /etc/apache2/sites-available/000-default.conf
```
Should show: `DocumentRoot /var/www/html/public`

**Check 2**: Verify AllowOverride
```bash
grep -A 4 "<Directory" /etc/apache2/sites-available/000-default.conf
```
Should contain: `AllowOverride All`

**Check 3**: Check .htaccess exists
```bash
ls -la /var/www/html/public/.htaccess
```

**Check 4**: Verify mod_rewrite is active
```bash
apache2ctl -M | grep rewrite
```

**Check 5**: Check file permissions
```bash
ls -la /var/www/html/public/
```
Files should be readable by Apache user (www-data)

---

## Additional Resources

- [Laravel Deployment Documentation](https://laravel.com/docs/deployment)
- [Apache mod_rewrite Guide](https://httpd.apache.org/docs/current/mod/mod_rewrite.html)
- [Laravel Routing Documentation](https://laravel.com/docs/routing)

---

**Date**: December 24, 2025  
**Issue**: Laravel "Not Found" error on non-home pages  
**Solution**: Update Apache DocumentRoot and enable .htaccess processing  
**Status**: ✅ Resolved
