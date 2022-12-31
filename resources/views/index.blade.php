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
    <link rel="stylesheet" href="/styles/style.css" />
    <title>Personal Blog</title>
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
                <img src="{{ $firstArticle->getFirstMediaUrl('images') }}" alt="article image" />
            </div>
            <div class="details">
                <span class="tags">{{ $firstArticle->tag }}</span>
                <a href="{{ route('detail', $firstArticle->id) }}">
                    <h2>{{ $firstArticle->title }}</h2>
                </a>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem
                    sapiente ipsam eaque aut cumque deleniti cum quia laudantium autem
                </p>
                <span>
                    <h5>Updated</h5>
                    <h6>{{ $firstArticle->created_at->diffForHumans() }}</h6>
                </span>
                <span> </span>
            </div>
        </div>
        <div class="middle-section">
            <h3>Latest Articles</h3>
            <a href="{{ route('all-articles') }}">View all</a>
        </div>
        <div class="articles-section">
            @foreach ($articles as $article)
                <div class="article">
                    <div class="image">
                        <img src="{{ $article->getFirstMediaUrl('images') }}" alt="article image" />
                    </div>
                    <div class="details">
                        <span class="tags">{{ $article->tag }}</span>
                        <a href="{{ route('detail', $article->id) }}">
                            <h4>{{ $article->title }}</h4>
                        </a>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem
                            sapiente ipsam eaque aut cumque deleniti cum quia laudantium autem
                        </p>
                        <span>
                            <h5>Updated</h5>
                            <h6>{{ $article->created_at->diffForHumans() }}</h6>
                        </span>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
    <section class="services">
        <div class="our-services">
            <div class="heading">
                <h1>Services We Provide</h1>
            </div>
            <div class="services-section">
                <div class="article">
                    <div class="image">
                        <img src="{{ asset('images/code1.jpg') }}" alt="article image" />
                    </div>
                    <div class="details">
                        <h3>Full Stack</h3>
                        <p>
                            Full stack development refers to the end-to-end application
                            software development, including the front end and back end. The
                            front end consists of the user interface, and the back end takes
                            care of the business logic and application workflows.
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="image">
                        <img src="{{ asset('images/code2.jpg') }}" alt="article image" />
                    </div>
                    <div class="details">
                        <h3>Front End</h3>
                        <p>
                            Front-end web development, also known as client-side development
                            is the practice of producing HTML, CSS and JavaScript for a
                            website or Web Application so that a user can see and interact
                            with them directly
                        </p>
                    </div>
                </div>
                <div class="article">
                    <div class="image">
                        <img src="{{ asset('images/code3.jpg') }}" alt="article image" />
                    </div>
                    <div class="details">
                        <h3>Back End</h3>
                        <p>
                            Back-end development means working on server-side software,
                            which focuses on everything you can't see on a website. Back-end
                            developers ensure the website performs correctly, focusing on
                            databases, back-end logic.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
