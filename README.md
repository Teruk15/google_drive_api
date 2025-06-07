# 📄 Google Drive File Viewer

A simple full-stack application that fetches and displays all publicly shared files from a specified Google Drive folder. The backend API is built with PHP, and the frontend is developed using React. While the current implementation previews PDFs, any Google Drive-supported file types (e.g., images, videos, documents) can be previewed as long as a preview URL is available.

---

### 🚀 Features

- Fetches files from a **public Google Drive folder** using the Drive API.
- Returns a **JSON** array of file metadata (name + preview URL).
- Renders each file in an embedded viewer (e.g., PDFs, images, videos).

---

### 🛠 Technologies Used

- **Backend**: PHP (served with Apache at `localhost:8080`)
- **Frontend**: React (calls the PHP API using Axios)
- **Google API**: Google Drive v3 API

---

## 🖥️ Setting Up the Local Development Environment

Follow the steps below to run this project locally on your machine.

---

### 📦 Prerequisites

- [Node.js & npm](https://nodejs.org/) (for the React frontend)
- [XAMPP](https://www.apachefriends.org/) or [MAMP](https://www.mamp.info/) (to run Apache + PHP)
- A modern web browser (e.g., Chrome)

---

### 🛠 Step 1: Clone the Repository

If you haven't already, clone or download the project to your local machine.

```bash
git clone https://github.com/Teruk15/google_drive_api.git
cd google_drive_api


### 🗂 Step 2: Set Up the PHP API

1. Place the `api.php` file inside your Apache directory. Example:
```bash
/var/www/html/google_drive_api/api.php
```

2. Start the **Apache server**. Example:
```bash
sudo service apache2 start
```

3. Verify it’s working by opening this URL in your browser (should return and show JSON on browser):
```bash
e.g. http://localhost:8080/google_drive_api/api.php
```

### ⚛️ Step 3: Set Up the React Frontend

0. If you are creating new project folder, run the command below:
```bash
npx create-react-app your-project
```

1. Navigate to the frontend project folder (or create a new one):
```bash
cd frontend
```

2. Start the React development server:
```bash
npm start
```

3. Open your browser and go to:
```bash
http://localhost:3000/
```

## 📌 DEMO

Here is the link being used in the repository.:

🔗 **Example Drive Folder:**  
[https://drive.google.com/drive/folders/13adXtGbU3fNzPPfr-aHH-rPeb81BVPsj](https://drive.google.com/drive/folders/13adXtGbU3fNzPPfr-aHH-rPeb81BVPsj)


## 🔧 Customizing for Your Own Google Drive Folder

To use your own Google Drive folder with this project, follow the steps below:

### 1. 📁 Make Your Drive Folder Public

1. Go to [Google Drive](https://drive.google.com/).
2. Right-click the folder you want to share and select **"Share"**.
3. Under **"General access"**, choose **"Anyone with the link"**.
4. Click **"Copy link"** and note the **Folder ID**. It will look something like this:
https://drive.google.com/drive/folders/<YOUR_FOLDER_ID>

Copy the part that comes after `/folders/` — that's your **Folder ID**.

---

### 2. 🔑 Get Your Own Google API Key

1. Go to the [Google Cloud Console](https://console.cloud.google.com/).
2. Create a new project (or select an existing one).
3. Enable the **Google Drive API**:
   - Navigate to **APIs & Services > Library**
   - Search for **Google Drive API**
   - Click **Enable**
4. Create credentials:
   - Go to **APIs & Services > Credentials**
   - Click **"Create Credentials" > "API key"**
   - Copy your newly generated **API key**.

---

### 3. ✏️ Update the `api.php` File

Open the `api.php` file in your project and replace the default values with your own:

```php
$apiKey = "YOUR_NEW_API_KEY";
$driveFolderID = "YOUR_NEW_FOLDER_ID";
```

## 📌 License

This project is intended for educational/demo purposes. Replace the API key with your own if deploying publicly.
