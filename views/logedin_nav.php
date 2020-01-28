<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">CMS - Elearning</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/vocab">Vocabulary Revisions</a>
                <a class="nav-link" href="/chat">Chat</a>
                <a class="nav-link" href="/authenticate/logout">Log Out</a>
                <a class="nav-link" href="/profile?id=<?= $_SESSION['logedin'] ?>">Profile</a>
            </li>
        </ul>
    </div>
</nav>