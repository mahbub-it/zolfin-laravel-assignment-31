#!/bin/bash
set -e

echo "Starting Apache configuration update..."

# Check for sudo
if [ "$EUID" -ne 0 ]; then 
  echo "Please run as root (use sudo)"
  exit 1
fi

echo "Writing new configuration to /etc/apache2/sites-available/000-default.conf..."
cat > /etc/apache2/sites-available/000-default.conf <<EOF
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

echo "Verifying configuration file content..."
if grep -q "AllowOverride All" /etc/apache2/sites-available/000-default.conf; then
    echo "Configuration file updated successfully."
else
    echo "Error: Configuration file update failed!"
    exit 1
fi

echo "Enabling mod_rewrite..."
a2enmod rewrite

echo "Restarting Apache..."
service apache2 restart

echo "SUCCESS! Apache configuration has been updated and restarted."
