# PixelNest Freelance Portfolio (PHP + MySQL)

A responsive freelance web-development portfolio starter built with HTML, CSS, Bootstrap 5, JavaScript, Core PHP and MySQL.

## Requirements
- XAMPP with Apache and MySQL
- PHP 8.0+ recommended
- MySQL/MariaDB

## 1. Install
1. Extract `freelance-portfolio.zip`.
2. Copy the `freelance-portfolio` folder into `C:\xampp\htdocs\`.
3. Start Apache and MySQL in XAMPP.
4. Open phpMyAdmin: `http://localhost/phpmyadmin`.
5. Import `database.sql`.

## 2. Configure database
Open `config/config.php`:
- `DB_HOST`: normally `127.0.0.1`
- `DB_PORT`: set `3307` if your XAMPP setup uses port 3307; otherwise use `3306`.
- `DB_NAME`: `freelance_portfolio`
- `DB_USER`: commonly `root` on a local XAMPP installation
- `DB_PASS`: your local MySQL password (often blank on a fresh XAMPP install)

Do not use a blank root password on a public production server.

## 3. Create the first admin login
Generate a password hash from Command Prompt (from your XAMPP PHP folder, or use the full php.exe path):

```bash
C:\xampp\php\php.exe -r "echo password_hash('ChooseYourStrongPassword!', PASSWORD_DEFAULT);"
```

Copy the resulting hash, then run this in phpMyAdmin SQL:

```sql
INSERT INTO admins (username, password_hash)
VALUES ('admin', 'PASTE_THE_GENERATED_HASH_HERE');
```

Now visit `http://localhost/freelance-portfolio/admin/login.php`.

## 4. Run the website
Visit `http://localhost/freelance-portfolio/`.

Admin dashboard: `http://localhost/freelance-portfolio/admin/login.php`

From the dashboard you can:
- Add, edit, delete and publish projects
- Add, edit and hide services
- Edit package names, prices, descriptions and features
- View contact enquiries and update their status

## 5. Add project screenshots
1. Put your own optimized JPG/PNG/WebP screenshots in the `uploads` folder.
2. In Admin > Add/Edit Project, enter a relative path such as `uploads/college-homepage.webp`.
3. Add a real live demo URL only when it is available.
4. Tick “Publish on website” when the project is ready.
The sample project records are unpublished by default. Do not represent academic/demo work as paid client work or add invented testimonials.

## 6. Personalize before launch
In `includes/header.php` and `index.php`, replace:
- `PixelNest` with your business name
- `hello@yourdomain.com` with your real business email
- `91XXXXXXXXXX` with your WhatsApp number in international format (digits only)
- Social profile links, if you add them
- Starting prices in Admin > Pricing packages

To create your WhatsApp URL use `https://wa.me/91XXXXXXXXXX` with country code and number, no `+`, spaces or hyphens.

## 7. Production checklist
- Buy a domain and hosting that supports PHP/MySQL; upload the project files and import the SQL database.
- Use the hosting provider's database credentials in `config/config.php`.
- Enable HTTPS/SSL and redirect HTTP to HTTPS.
- Change/remove default demo content and create a strong admin password.
- Keep PHP and dependencies updated; back up files and database.
- Add CSRF protection, rate limiting/CAPTCHA and email notifications before accepting public traffic at scale.
- Restrict admin access and use a dedicated least-privilege database user in production.
- The Google Maps section is intentionally not hard-coded; add an official map embed only if you have a business address you want to publish.
- The contact form stores enquiries in MySQL. It does not send email automatically; configure SMTP with a trusted mail provider if you need notifications.

## Notes
- Bootstrap and Google Fonts are loaded from CDNs, so an internet connection is needed for those assets.
- This is a functional starter project, not a substitute for a security review before handling real customer data or payments.
