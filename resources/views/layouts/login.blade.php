<style>
:root{
    --link-color: #6C4BB4;
    --primary-color-opacity: #e9d5ff;
    --white-shade: #f0f8ff;
    --secondary-color:#1e293b;
    --primary-padding: 8px;
    --pilled-shape-radius: 40px;
    --color1: #36EB84;
    --color2: #2BCDB5;
    --primary-gradient: linear-gradient(to right,var(--color2), var(--color1))
}


body{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: sans-serif;
    background: linear-gradient(to right, #1e293b, #434343);
}

.container{
    padding: 15px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px #353636;
    background: #fff;
}
.item-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
.log-in{
    font-size: 35px;
    color: var(--secondary-color);
}
.log-in::after{
    content: "";
    display: block;
    width: 60%;
    height: 3px;
    margin-top: 8px;
    background: var(--primary-gradient);
    margin-inline: auto;
}
.form-input{
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
}
input[type="text"], input[type="password"]{
    padding: var(--primary-padding);
    width: 300px;
    border-radius: var(--pilled-shape-radius);
    border: none;
    background: #E7FDF0;
    color: var(--secondary-color);
    outline: none;
    border: 1px solid transparent;
}
@media only screen and (max-width: 300px) {
    input[type="text"], input[type="password"] {
        width: 200px;
    }
  }
input[type="text"]:focus-visible, input[type="password"]:focus-visible{
    border: 1px solid var(--color1);
    background: transparent;
}
.label{
    color: var(--secondary-color);
    margin-bottom: 3px;
}
.display-space-between{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0 10px 0;
}

.item-container button{
    border-radius: 50%;
    border: none;
    padding: 5px;
    background: transparent;
    margin-left: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 2px 2px 5px #353636;
}

button[type="submit"]{
    width: 100%;
    padding: var(--primary-padding);
    border-radius: var(--pilled-shape-radius);
    border: none;
    background: #ff6633;
    color: var(--white-shade);
    margin: 10px 0 10px 0;
}
.chekbox-label{
    font-size: 14px;
}

a{
    text-decoration: none;
    color: var(--link-color);
    font-size: 14px;
}

</style>
<body>
    <div class="container" >
        <div class="item-container">
            <h2 class="log-in">Login</h2>
        </div>


        <form action="{{url('index')}}" method="post">
        @csrf
            <div class="form-input">
                <label for="password" class="label">Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <button type="submit">Visit Website</button>
            </div>
        </form>

    </div>
</body>