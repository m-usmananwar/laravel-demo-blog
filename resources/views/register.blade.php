<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=\, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/styles/login.css" />
    <title>Register</title>
</head>

<body>
    <header>
        <div class="heading">
            <h1>Lara Blogs</h1>
        </div>
        <nav>
            <div class="nav-links">
                <ul class="navlinks-class">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="{{ route('show-login') }}">Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </header>
    <main>
        <div class="hero-section">
            <div class="image">
                <img src="{{ asset('images/code1.jpg') }}" alt="article image" />
            </div>
            <div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="text" name="name" id="" placeholder="Enter Name" />
                    <input type="email" name="email" id="" placeholder="Email Address" />
                    <input type="password" name="password" id="" placeholder="Password" />
                    <button type="submit">REGISTER</button>
                </form>
            </div>
        </div>
        <div class="mail-section">
            <h2>Follow by Email</h2>
            <p>Get notified about next update direct to your inbox</p>
            <input type="email" placeholder="Email Address" />
            <button>SUBSCRIBE</button>
            <p>*We promise that we don't spam</p>
        </div>
    </main>
    <footer>
        <div class="follow">
            <h1>Lara Blogs</h1>
            <div class="text-class">
                <h2>Follow Us</h2>
                <p>Follow us on our social handles to get latest news about us</p>
            </div>
        </div>

        <div class="social-links">
            <ul>
                <li>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="/js/index.js"></script>
</body>

</html>
