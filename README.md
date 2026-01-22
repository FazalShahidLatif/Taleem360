# Taleem360

## Installation Instructions for Localhost Setup
To set up the Taleem360 project on your localhost, you can use either XAMPP or Local by Flywheel.

### Using XAMPP:
1. Download and install XAMPP from [apachefriends.org](https://www.apachefriends.org/index.html).
2. Place the project folder in the `htdocs` directory inside your XAMPP installation folder.
3. Start Apache and MySQL from the XAMPP control panel.
4. Open your browser and navigate to `http://localhost/[your_project_folder]`.

### Using Local by Flywheel:
1. Download and install Local by Flywheel from [localwp.com](https://localwp.com/).
2. Create a new site and choose the option to import from existing files.
3. Select the Taleem360 project folder and follow the prompts to complete the setup.
4. Once the site is created, click on the site name in Local to open it in your browser.

## WordPress Installation Steps
1. Go to `http://localhost/[your_project_folder]/wp-admin/install.php`.
2. Follow the on-screen prompts to choose your language and set up your WordPress database.
3. Fill in the site title, username, password, and email address to complete the installation.

## Theme Activation
1. Go to the WordPress admin dashboard.
2. Navigate to Appearance > Themes.
3. Find the Taleem360 theme and click the "Activate" button.

## Features Overview
- Responsive design
- user-friendly navigation
- Integration with services for resource management

## Folder Structure
- `/wp-content/themes/taleem360/`  - Theme files
- `/wp-content/plugins/`  - Plugins for extended functionality
- `/wp-content/uploads/`  - Media uploads

## Supported Pages
- Home
- About
- Services
- Contact
- Madrasa
- Resources

## Phase 3 Features Description
In Phase 3 of the development, the following features will be included:
- Enhanced user roles and permissions
- Advanced resource management capabilities
- Integration with third-party APIs for additional functionalities

## Deployment Guide for Live Server
1. Choose a hosting provider that supports WordPress.
2. Set up a domain and configure DNS settings to point to your hosting server.
3. Upload your project files via FTP to the server root directory.
4. Import your local database to the live server using phpMyAdmin.
5. Update the `wp-config.php` file with the live database credentials.
6. Access your live site by navigating to your domain.

If you encounter any issues during the setup, refer to the documentation or support channels for assistance.