<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Registration</title>
    <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
    <header></header>
    <main>
        <h2>Tenant Registration</h2>
        <div class="center-button">
            <a href="../index.php">
                <button class="user-type-button tenant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 0-6 6h12a6 6 0 0 0-6-6z" />
                    </svg>
                    Go to Home
                </button>
            </a>
        </div>
        <form action="submit.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required><br><br>

            <label for="nid">NID:</label>
            <input type="text" name="nid" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="university">University:</label>
            <input type="text" name="university" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" required><br><br>

            <label for="present_address">Present Address:</label>
            <textarea name="present_address" rows="4" required></textarea><br><br>

            <label for="permanent_address">Permanent Address:</label>
            <textarea name="permanent_address" rows="4" required></textarea><br><br>

            <label for="job">Job:</label>
            <input type="text" name="job" required><br><br>

            <label for="salary">Monthly Salary:</label>
            <input type="text" name="salary" required><br><br>

            <label for="sponsor">Sponsor:</label>
            <select id="sponsor" name="sponsor" required>
                <option value="Self">Self</option>
                <option value="Family">Family</option>
            </select><br><br>

            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select><br><br>

            <!-- <label for="nid_doc">Scanned Copy of NID:</label>
            <input type="file" name="nid_doc" accept=".pdf, .doc, .docx, .jpg" required><br><br> -->

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <label for="password">Confirm password:</label>
            <input type="password" name="re-password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </main>
</body>

</html>