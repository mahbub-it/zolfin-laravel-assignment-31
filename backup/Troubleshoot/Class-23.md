Fix Authentication & Registration Issues
Goal Description
Fix the login page returning "The email field is required" error and ensure user registration saves to the users table instead of the customers table.

User Review Required
NOTE

The login form incorrectly had a placeholder "Email address or Username" but the controller strictly enforces email validation. I will update the input name to email to match the controller. If username login is desired, the controller would need significant changes.

Proposed Changes
Views
[MODIFY] 
login.blade.php
Change input name from login_id to email.
[MODIFY] 
register.blade.php
Change form action from route('customer.registerProcess') to route('registerProcess').
Verification Plan
Automated Tests
None available.
Manual Verification
Login:
Go to /login.
Enter a valid email and password.
Submit.
Verify redirection to dashboard (or at least no "email field required" error).
Registration:
Go to /register.
Fill out the form.
Submit.
Verify user is created in the users table (I can check the database or check if I am logged in as a User).
Verify redirection to dashboard.