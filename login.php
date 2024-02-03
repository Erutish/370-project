<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./head-nav-foot/header.css">
    <link rel="stylesheet" href="styles/registration.css">
</head>

<body>
    <header>
    <div class="center-button">
            <a href="index.php">
                <button class="user-type-button tenant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 0-6 6h12a6 6 0 0 0-6-6z" />
                    </svg>
                    Go to Home
                </button>
            </a>
        </div>
    <div class="header-middle">
        <a href="index.php">
            <h1>Rent A Room</h1>
        </a>
    </div>
    
    <div class="header-right">
        <a href="">About</a>
        <a href="">Contact</a>
    </div>    
    </header>
    
    <main>
        <div class="reg-buttons reg-home-background">
            <a href="tenant/login.php">
                <button class="user-type-button tenant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 0-6 6h12a6 6 0 0 0-6-6z" />
                    </svg>
                    Tenant
                </button>
            </a>
            <a href="./homeowner/homeowner_login.php">
                <button class="user-type-button homeowner">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1 8.184V14a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.184l-6-3.818-6 3.818zM14 14H2v-3.051l6-3.818 6 3.818V14z" />
                        <path fill-rule="evenodd" d="M8 0a.5.5 0 0 1 .5.5V3h-1V.5A.5.5 0 0 1 8 0zm-6 5H.5a.5.5 0 0 1-.4-.8L2 1.2l2.9 2.6a.5.5 0 0 1-.4.8H2zm2 0h1V3H4v2zm4-3H8v1h2V2zm0 4H8v1h2V6zm2-4h1v1h-1V2zm0 4h1V6h-1v1zm-2 4H8v1h2v-1zm-2 0H6v1h2v-1zm0-4H6v1h2V6z" />
                    </svg>
                    Homeowner
                </button>
            </a>
        </div>
    </main>
</body>

</html>