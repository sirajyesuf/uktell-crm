Subject: Your Login Credentials For UKTELL CRM

Dear {{$name}},

We hope this email finds you well. we are sending you your login credentials to access UKTELL CRM.

Email: {{$email}}
Password: {{$temporaryPassword}}

Please keep this information secure and do not share it with anyone. For security reasons, we recommend changing your password after logging in for the first time. 

To log in, please click {{route('filament.admin.auth.login')}} and use the provided credentials. If you encounter any issues or have any questions, feel free to reach out to our support team at 
{{env('SUPPORT_MAIL')}}.

Thanks,  
{{ config('app.name') }}