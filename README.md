# COLORS — LAMP Stack Web Application

## Overview
COLORS is a small full-stack web application built on the LAMP stack. A user logs in, adds color names to a personal list, and searches the colors they have saved. Each user sees only their own colors.

The app has two parts:
- **Frontend** (`public/`): HTML pages styled with CSS. JavaScript sends requests to the API and displays the results without reloading the page.
- **Backend API** (`LAMPAPI/`): PHP scripts that receive JSON requests, query a MySQL database, and return JSON responses.

## Technologies Used
| Layer | Role |
|---|---|
| **L**inux | Server operating system |
| **A**pache | Serves the web pages and runs the PHP scripts |
| **M**ySQL | Stores users and their colors |
| **P**HP | Backend API that returns JSON |
| Frontend | User interface and API calls |

## Project Structure

```
.
├── LAMPAPI/
│   ├── config.example.php   # Template for database credentials
│   ├── db.php               # Shared database connection used by every endpoint
│   ├── Login.php            # Checks a user's login and password
│   ├── AddColor.php         # Saves a new color for a user
│   └── SearchColors.php     # Finds a user's colors matching a search term
├── public/
│   ├── index.html           # Login page
│   ├── color.html           # Add and search colors page
│   ├── css/                 # Stylesheets
│   ├── images/              # Images used by the pages
│   └── js/                  # Frontend logic and API calls
├── .gitignore
├── LICENSE.md
└── README.md
```

> `LAMPAPI/config.php` holds the real database credentials. It is listed in `.gitignore` and is intentionally **not** included in this repository. Create it from `config.example.php` during setup.

### API Endpoints

All endpoints accept a JSON body sent with an HTTP `POST` request and return JSON.

| Endpoint | Request fields | Returns |
|---|---|---|
| `Login.php` | `login`, `password` | User ID, first name, last name, or an error |
| `AddColor.php` | `color`, `userId` | An empty error on success |
| `SearchColors.php` | `search`, `userId` | A list of matching color names, or an error |

## Setup Instructions
1. Set up a Linux server with Apache, MySQL, and PHP installed.
   - Can use Digital Ocean LAMP Stack Droplet.
2. Create a MySQL database with `Users` and `Colors` tables.
3. Copy `public/` and `LAMPAPI/` into `/var/www/html/`.

## Running and Accessing the Application
1. Open a web browser and go to your server's address:
   - `http://<your-server-ip-or-domain>/`
2. **Log in** with a username and password stored in the `Users` table.
3. On the colors page:
   - **Add a color:** type a color name and click the add button.
   - **Search colors:** type part of a name to see every matching color you have saved.

## Assumptions and Limitations
- There is no registration page. User accounts are created directly in the database.
- The site might runs over HTTP, not HTTPS. So try HTTP if HTTPS don't work.
- The frontend assumes the API is located at `/LAMPAPI` on the same server as the web pages.
- Colors can be added and searched, but not edited or deleted.

## AI Usage
I used Anthropic AI (Claude) to assit with writing this README.md. I also consult the placement of db.php and config.example.php.

## License
This project is licensed under the MIT License. See [`LICENSE.md`](LICENSE.md) for details.
