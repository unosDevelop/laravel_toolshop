<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" id="search-input" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="search-button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div id="search-results small" class="mt-2"></div>

    <script>
        var originalBody = document.body.innerHTML;
        document.getElementById('search-button').addEventListener('click', function() {
            var searchValue = document.getElementById('search-input').value.trim().toLowerCase();

            if (!searchValue) {
                return;
            }

            var bodyText = document.body.innerHTML;
            var regex = new RegExp('(' + searchValue + ')', 'gi');

            var matches = bodyText.match(regex);
            var matchCount = matches ? matches.length : 0;

            var highlightedText = bodyText.replace(regex, '<span class="highlight">$1</span>');
            document.body.innerHTML = highlightedText;

            var resultDiv = document.getElementById('search-results');
            resultDiv.innerHTML = 'Jumlah hasil pencarian: ' + matchCount;
        });
        var style = document.createElement('style');
        style.innerHTML = `
            .highlight {
                background-color: yellow;
                font-weight: bold;
            }
        `;
        document.head.appendChild(style);
    </script>



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if ($authUser)
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                {{ $authUser->name }} /
            </span>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                {{ $authUser->occupation }}
            </span>
                <img class="img-profile rounded-circle"
                        src="{{ $authUser->profile_image ? asset('images/profile/' . $authUser->profile_image) : asset('images/default_image/user.jpg') }}">
            @else
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    Guest
                </span>
                <img class="img-profile rounded-circle"
                        src="{{ asset('images/default_image/user.jpg') }}">
            @endif
            </a>
        </li>
    </ul>
</nav>
