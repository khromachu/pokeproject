<header>
    <nav class="navbar navbar-light" style="background-color: #ced4da; background-image: url('./images/back1.png'); display: flex; justify-content: center">
        <a class="navbar-brand" href="#">
            <img src="./pokemon.svg" alt="" width="50" height="50" class="d-inline-block align-text-center mx-2">
            Pokemon Database
        </a>
        <form class="mx-3">
            <h6>Поиск по номеру</h6>
            <div style="display: grid; grid-template-columns: 1fr 2fr">
                <div style="max-width: 200px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div>
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div style="display: flex; align-items: center">
            <div class="col">
                <h5>Name</h5>
                <h6>Role</h6>
            </div>
            <button class="btn btn-light" type="submit">
                <i class="fas fa-user"></i>
            </button>
        </div>
    </nav>
</header>
