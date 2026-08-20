# 🔎 Recon: A Retro Security & Web Tool (Legacy Project)

> **"Every complex system we understand today, started with a messy, hardcoded experiment yesterday."**

This repository is a **Time Capsule**. It contains the source code of an amateur security and web-utility tool that we built entirely from scratch a few years ago. It was our first real dive into building a bridge between a Command Line Interface (CLI) and a web backend.

## 📖 The Story Behind The Code
A few years ago, we were fascinated by networking, offensive security, and how the web actually works under the hood. We didn't want to just use existing tools; we wanted to build our own. 

At the time, our architectural mindset was simple: *"If it works, it's perfect."* 
We wanted a tool that could scan ports, generate sitemaps, find admin panels, and log everything to a remote database. Looking back at this code now, we can see all the classic beginner "sins":
- Hardcoded URLs scattered throughout the code.
- Using `os.system` to dynamically install Python libraries on the fly.
- Sending data to the database using plain HTTP GET requests.
- No real error handling, no design patterns—just raw, enthusiastic logic.

We have intentionally decided **not** to refactor, update, or "fix" this code. We are preserving it exactly as it was written to serve as a milestone of our learning journey and a reminder of where we started.

## 🤝 The Team & Architecture
This project was a true collaborative effort. We built the core tool together, while the web infrastructure was handled exclusively by my teammate:

* **Python CLI & Core Tool** | Co-developed by **[ErSHaD](https://github.com/0xErSHaD)** & **[SobhanBagherian](https://github.com/SobhanBagherian/Recon)**
  * We worked side-by-side to build the command-line interface, web crawler, sitemap generator, and port scanner logic.
  * Brainstormed, structured, and implemented the core functionalities as a team.

* **PHP Backend & Database** | Exclusively by **[SobhanBagherian](https://github.com/SobhanBagherian/Recon)**
  * Handled 100% of the server-side operations and PHP architecture.
  * Designed and managed the MySQL database to store the logs and results.
  * Built the entire bridge for data persistence without any backend intervention from my side.


## ✨ Features
* 🕸️ **Sitemap Crawler:** Maps website structures up to depth 2 using `BeautifulSoup`.
* 🔎 **Subdomain Enumeration:** Discovers subdomains using wordlists and `dnspython`.
* 🏷️ **Status & Title Inspector:** Fetches HTTP codes and page titles.
* 📡 **Port Scanner:** Socket-based scanner for common open ports.
* 🕵️ **Regex Data Extraction:** Harvests exposed emails and phone numbers.
* ☁️ **PHP Backend Integration:** Logs all reconnaissance data directly to a remote database.


## 🚀 How It Actually Works (Setup & Execution)
Since this tool relies on a custom backend to log and process data, simply running the Python script won't work out of the box. You need to set up the infrastructure first:

### 1. Backend Setup (PHP & MySQL)
1. Upload the files from the `Backend` directory to a web server (e.g., a live host or a local server like XAMPP).
2. Create a MySQL database and set up the required tables (review the PHP files for the expected structure).
3. Update the database connection credentials (`db_host`, `db_user`, `db_pass`, etc.) inside the PHP files.

### 2. Client Setup (Python)
1. Open the Python source code in the `CLI` directory.
2. Locate the hardcoded backend URLs.
3. Replace them with the actual public URLs of your hosted PHP files.

### 3. Execution
Once the server is listening and the Python tool is pointing to the right URLs, you can run the tool:

```bash
# Clone the repository
git clone [https://github.com/0xErSHaD/Recon.git](https://github.com/0xErSHaD/Recon.git)

# Navigate to the CLI directory
cd Recon/CLI

# Run the tool (Warning: it might try to pip install things via os.system!)
python main.py -h

Note: This repository is archived and will not receive any updates. It stands purely as a personal laboratory experiment and a testament to our continuous learning in the fields of Systems Programming and Security.
