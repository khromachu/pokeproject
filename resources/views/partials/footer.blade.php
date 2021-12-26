<style>
    footer{
        background-color: #212121;
        color: white;
    }
    .f-container{
        margin: auto;
        display: flex;
        justify-content: space-between;
    }
    nav{
        font-size: .8rem;
        padding: 1rem;
    }
    nav a{
        color: #515151;
        text-decoration: none;
    }
    nav a:hover{
        color: inherit;
    }
    .divider{
        background-color: #111111;
        align-self: center;
        width: 5px;
        height: 150px;
        border-radius: 10px;
    }
    nav.pg{
        display: grid;
        grid-template-columns: 1fr 2fr;
        align-items: center;
        font-size: .6rem;
    }
    nav.pg ul{
        list-style-type: none;
    }
</style>

<footer>
    <div class="f-container">
        <nav>
            <h2>The Pokémon Company</h2>
            <ul>
                <li><a href="#">Руководство по игре Покемон для родителей</a></li>
                <li><a href="#">Служба поддержки клиентов</a></li>
                <li><a href="#">О нашей компании</a></li>
                <li><a href="#">Выбери страну/регион</a></li>
                <li><a href="#">Пресс-центр Покемон</a></li>
            </ul>
        </nav>
        <div class="divider"></div>
        <nav class="pg">
            <img src="https://assets.pokemon.com/static2/_ui/img/footer/thepokemoncompanyinternational-seal-1596150491.png">
            <ul>
                <li><a href="#">Условия использования</a></li>
                <li><a href="#">Уведомление о конфиденциальности</a></li>
                <li><a href="#">Информация о cookies</a></li>
                <li><a href="#">Юридическая информация</a></li>
            </ul>
        </nav>
    </div>
</footer>
