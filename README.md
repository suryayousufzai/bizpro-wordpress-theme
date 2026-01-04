# BizPro WordPress Theme

![WordPress](https://img.shields.io/badge/WordPress-6.x-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.x-purple.svg)
![License](https://img.shields.io/badge/License-GPL%20v2-green.svg)

A professional, modern WordPress theme designed for business websites. Built with clean code, custom post types, and responsive design.

## 🌟 Features

### Core Features
- ✅ **Fully Responsive Design** - Mobile-first approach, works on all devices
- ✅ **Custom Post Types** - Services, Team Members, Portfolio with custom fields
- ✅ **SEO Optimized** - Semantic HTML5, proper heading structure
- ✅ **Performance Optimized** - Fast loading, lazy loading images
- ✅ **Accessibility Ready** - WCAG compliant, keyboard navigation
- ✅ **Translation Ready** - i18n support with text domain

### Custom Post Types

#### 1. Services
- Showcase your business services
- Custom icons/images support
- Individual service pages with full descriptions

#### 2. Team Members
- Display team profiles with photos
- Custom fields: Position, Email, Phone, Social Links (LinkedIn, Twitter)
- Professional team member pages

#### 3. Portfolio
- Showcase projects and case studies
- Custom fields: Client Name, Project URL, Completion Date
- Portfolio categories taxonomy
- Filterable portfolio grid

### Design Features
- Modern, clean interface
- Custom color scheme with CSS variables
- Smooth animations and transitions
- Professional typography
- Card-based layouts
- Sticky header navigation

### Developer Features
- Well-organized file structure
- Properly enqueued scripts and styles
- WordPress Coding Standards compliant
- Commented code for easy understanding
- Custom meta boxes for CPTs
- Gutenberg/Block Editor support

## 📋 Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher
- MySQL 5.7 or higher

## 🚀 Installation

### Method 1: Manual Installation

1. Download the theme files from this repository
2. Navigate to your WordPress installation directory
3. Copy the `bizpro` folder to `/wp-content/themes/`
4. Go to WordPress Admin → Appearance → Themes
5. Activate the "BizPro Business Theme"

### Method 2: Via WordPress Admin

1. Download the theme as a `.zip` file
2. Go to WordPress Admin → Appearance → Themes → Add New
3. Click "Upload Theme" and choose the `.zip` file
4. Click "Install Now"
5. After installation, click "Activate"

## 🎨 Theme Setup

### 1. Configure Menus
1. Go to **Appearance → Menus**
2. Create a menu for "Primary Menu"
3. Create a menu for "Footer Menu"
4. Assign them to their locations

### 2. Set Up Homepage
1. Go to **Settings → Reading**
2. Select "A static page" for homepage
3. Choose or create a page for homepage

### 3. Add Custom Logo
1. Go to **Appearance → Customize → Site Identity**
2. Upload your logo
3. Adjust logo size if needed

### 4. Add Content

#### Add Services:
1. Go to **Services → Add New**
2. Add service title and description
3. Set a featured image (icon/illustration)
4. Publish

#### Add Team Members:
1. Go to **Team → Add New**
2. Add team member name and bio
3. Upload profile photo as featured image
4. Fill in custom fields: Position, Email, Phone, Social Links
5. Publish

#### Add Portfolio Items:
1. Go to **Portfolio → Add New**
2. Add project title and description
3. Upload project screenshot/image
4. Fill in: Client Name, Project URL, Completion Date
5. Assign portfolio categories
6. Publish

## 📁 File Structure
```
bizpro/
├── assets/
│   ├── css/
│   │   └── main.css              # Main stylesheet
│   ├── js/
│   │   └── main.js               # JavaScript functionality
│   └── images/                   # Theme images
├── inc/
│   └── custom-post-types.php     # Custom post types registration
├── template-parts/               # Reusable template parts
├── page-templates/               # Custom page templates
├── archive.php                   # Blog archive template
├── archive-service.php           # Services archive
├── archive-team.php              # Team archive
├── archive-portfolio.php         # Portfolio archive
├── single.php                    # Single post template
├── single-service.php            # Single service template
├── single-team.php               # Single team member template
├── single-portfolio.php          # Single portfolio template
├── page.php                      # Page template
├── header.php                    # Header template
├── footer.php                    # Footer template
├── sidebar.php                   # Sidebar template
├── comments.php                  # Comments template
├── 404.php                       # 404 error page
├── functions.php                 # Theme functions
├── style.css                     # Theme stylesheet (required)
└── README.md                     # This file
```

## 🎨 Customization

### Colors
Modify CSS variables in `assets/css/main.css`:
```css
:root {
    --primary-color: #2563eb;      /* Primary brand color */
    --secondary-color: #1e40af;    /* Secondary color */
    --text-dark: #1f2937;          /* Dark text */
    --text-light: #6b7280;         /* Light text */
}
```

### Fonts
Change font families in `assets/css/main.css`:
```css
:root {
    --font-primary: 'Your Font', sans-serif;
    --font-heading: 'Your Heading Font', serif;
}
```

### Layout
Adjust container width in `assets/css/main.css`:
```css
.container {
    max-width: 1200px;  /* Change this value */
}
```

## 🔧 Development

### Prerequisites
- Node.js and npm (for development)
- Local WordPress development environment (Local, XAMPP, etc.)

### Development Workflow
1. Make changes to theme files
2. Test locally in WordPress
3. Commit changes to Git
4. Push to GitHub

## 📝 Changelog

### Version 1.0.0 (2025-01-04)
- Initial release
- Custom post types: Services, Team, Portfolio
- Responsive design
- Custom meta boxes
- Archive and single templates
- Professional styling
- Mobile menu functionality

## 🤝 Contributing

This is a portfolio project. If you find any bugs or have suggestions:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

## 👨‍💻 Author

**Your Name**
- GitHub: [@yourusername](https://github.com/yourusername)
- LinkedIn: [Your LinkedIn](https://linkedin.com/in/yourprofile)
- Portfolio: [yourwebsite.com](https://yourwebsite.com)

## 🙏 Acknowledgments

- Built with WordPress best practices
- Follows WordPress Coding Standards
- Inspired by modern web design trends

## 📧 Support

For questions or support, please open an issue on GitHub.

---

**Made with ❤️ for WordPress**
```

---

## **Update Your Information**

**In the README.md, replace:**
- `Your Name` → Your actual name
- `@yourusername` → Your GitHub username
- LinkedIn and Portfolio links → Your actual links

---

## **Create .gitattributes File** (if not exists)

**Create file: `.gitattributes`** in root folder:
```
# Auto detect text files and normalize line endings
* text=auto

# Force these to always use LF
*.php text eol=lf
*.css text eol=lf
*.js text eol=lf
*.md text eol=lf

# Binary files
*.png binary
*.jpg binary
*.jpeg binary
*.gif binary
*.ico binary
*.svg binary
*.woff binary
*.woff2 binary
*.ttf binary
*.eot binary