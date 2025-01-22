

<link rel="stylesheet" href="../css/style.css">

 


<div class="wrapper">
    <h1>Exemple de formulaire de connexion</h1>
    <p>Mise en page de base d'un formulaire de connexion.</p>

    <section class="login-container">
        <div>


            <form action="Register.php" method="GET"">
              
                <input type="text" name="username" placeholder="Nom d'utilisateur" required="required"/>


    <label for="emailAddress">Email</label>
    <input id="emailAddress" type="email" name="email" placeholder="Votre email">


    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>
                <button type="submit">Connexion</button>

            </form>
        </div>
    </section>

</div>