# 📊 Dynamic Matrix - Advanced Multiplication Dashboard

A modern, interactive, and responsive web application built with **PHP, JavaScript, and CSS** that generates multiple multiplication tables dynamically with advanced UI features and real-time processing.

---

## 🚀 Live Features

- 🔢 Generate multiple multiplication tables at once
- 📏 Custom range support (Start & End values)
- ⚡ AJAX-powered (no page reload)
- 🌙 Dark / Light theme toggle
- 🧠 Strong input validation (client + server side)
- 📱 Fully responsive design (mobile + desktop)
- 🎨 Modern dashboard UI
- 🛡️ Secure input sanitization (XSS protection)

---

## 🧩 Project Structure
multiplication-dashboard/
│
├── assets/
│ ├── css/
│ │ └── style.css
│ └── js/
│ └── app.js
│
├── includes/
│ └── generator.php
│
├── index.php
└── README.md


---

## ⚙️ How It Works

1. User enters multiple numbers (comma separated)
2. Defines a custom multiplication range (start → end)
3. JavaScript validates input on client side
4. AJAX sends request to PHP backend (`generator.php`)
5. PHP sanitizes and validates data securely
6. Multiplication tables are generated dynamically
7. Results are rendered instantly without page reload

---

## 🛠️ Technologies Used

- PHP (Backend logic)
- JavaScript (AJAX + DOM handling)
- HTML5 (Structure)
- CSS3 (Modern UI + Dark Mode)
- Google Fonts (Inter UI font)

---

## 🔒 Security Features

- Input sanitization using `filter_var()`
- XSS protection using `htmlspecialchars()`
- Server-side validation (strict)
- Request method enforcement (POST only)
- Error handling with proper HTTP status codes

---

## 🎯 Key Learning Outcomes

This project demonstrates:

- Full-stack PHP development
- AJAX asynchronous communication
- UI/UX design principles
- Secure backend validation
- Modular project architecture
- Real-world dashboard design patterns

---

## 📸 UI Preview

> Add screenshots here (recommended for GitHub)

```
assets/screenshots/home.png
assets/screenshots/dark-mode.png
```

---

## 🚀 How to Run Locally

1. Install XAMPP / WAMP / Laragon
2. Move project into `htdocs`
3. Start Apache server
4. Open browser:

```

http://localhost/multiplication-dashboard/

---

## 🔮 Future Improvements

- Export tables as PDF
- Save history using MySQL database
- User authentication system
- Graph visualization of multiplication data
- REST API version (JSON output)

---

## 👨‍💻 Author

Beginner PHP Developer → Growing into Full-Stack Developer 🚀

---

## ⭐ Support

If you like this project, give it a ⭐ on GitHub!
