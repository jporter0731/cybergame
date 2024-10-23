<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href=<?php echo url_for('home'); ?>>Galactic Codebreaker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo url_for('pick_passcode'); ?>">Guess a Passcode</a></li>
                        <li><a class="dropdown-item" href="<?php echo url_for('view_passcode'); ?>">View my Passcode</a></li>
                        <?php //surround the below block with an if statement that only allows the user to set a passcode once
                        echo "<li><a class=\"dropdown-item\" href=";
                        echo url_for('set_passcode');
                        echo ">Set Passcode</a></li>";?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo url_for('tutorial'); ?>">Tutorial</a></li>
                        <li><a class="dropdown-item" href="<?php echo url_for('leaderboard'); ?>">Leaderboard</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
