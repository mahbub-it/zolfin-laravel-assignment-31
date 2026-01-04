Customer Registration and Login Fixes
We have successfully separated the Customer registration flow from the generic User registration and fixed several login/logout issues.

Changes Implemented
1. Fixed Registration Routing
We updated the registration forms to point to the correct 
CustomerController
 instead of 
LoginController
.

Files Modified:

resources/views/authentication/register.blade.php
resources/views/customer/register.blade.php
Change: Updated form action:

action="{{ route('customer.registerProcess') }}"
2. Fixed Login Failure (Double Hashing)
The 
Customer
 model was automatically encrypting passwords, but the 
CustomerController
 was encrypting them again before login, causing it to fail. We removed the extra encryption in the controller.

File Modified: 
app/Http/Controllers/CustomerController.php

Change:

// BEFORE (failed)
'password' => bcrypt($request->password)
// AFTER (fixed)
'password' => $request->password
3. Fixed Login Validation Error
The customer login form was sending login_id but the controller expected email.

File Modified: 
resources/views/customer/login.blade.php

Change:

<input name="email" ... >
4. Enabled Logout
We uncommented the 
signout
 method in the controller to allow customers to log out properly.

File Modified: 
app/Http/Controllers/CustomerController.php

Verification
Registration now saves to the customers table.
Auto-login after registration works.
Manual login works (using new accounts).
Logout redirects to the login page.