<?php
	header('Content-type: text/css; charset:UTF-8');
?>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    min-width: 1000px;
    background: linear-gradient(135deg, #0f1115 0%, #181a20 100%);
    background-attachment: fixed;
    color: #e2e8f0;
    min-height: 100vh;
}

#wrapper {
    display: block;
    min-height: 500px;
    margin: 60px auto;
    max-width: 900px;
    background: rgba(30, 33, 40, 0.65);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    padding: 50px;
    text-align: center;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

h2 {
    color: #10b981;
    font-weight: 600;
    margin-bottom: 30px;
    font-size: 2.2em;
    letter-spacing: -0.5px;
}

/* Forms and Inputs */
form p {
    margin-bottom: 20px;
    text-align: left;
    font-size: 0.95em;
    color: #d1d5db;
    font-weight: 500;
}

input[type="text"], input[type="date"], select {
    width: 100%;
    padding: 14px 20px;
    margin-top: 8px;
    background: rgba(15, 17, 21, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    color: #f3f4f6;
    font-size: 1em;
    outline: none;
    transition: all 0.3s ease;
}

input[type="text"]:focus, input[type="date"]:focus, select:focus {
    border-color: #10b981;
    box-shadow: 0 0 15px rgba(16, 185, 129, 0.15);
    background: rgba(15, 17, 21, 1);
}

input[type="submit"] {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #ffffff;
    padding: 15px 40px;
    border: none;
    border-radius: 12px;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 15px rgba(16, 185, 129, 0.2);
    margin-top: 20px;
    width: 100%;
    max-width: 300px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

input[type="submit"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(16, 185, 129, 0.4);
}

/* Tables */
table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    margin-top: 20px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.4);
    background: rgba(15, 17, 21, 0.4);
}

th, td {
    text-align: left;
    padding: 18px 24px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.03);
}

th {
    background: rgba(16, 185, 129, 0.15);
    color: #10b981;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85em;
    letter-spacing: 1.5px;
}

tr {
    transition: all 0.2s ease;
}

tr:hover {
    background: rgba(255, 255, 255, 0.03);
}

tr:last-child td {
    border-bottom: none;
}

/* Homepage Title */
.hit-the-floor {
    text-align: center;
    margin-top: 20vh;
    color: transparent;
    font-size: 6vw;
    font-weight: 800;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(to right, #10b981, #34d399, #059669);
    -webkit-background-clip: text;
    background-clip: text;
    line-height: 1.2;
    animation: gradientText 5s ease infinite;
    background-size: 200% 200%;
    text-shadow: none;
}

@keyframes gradientText {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
