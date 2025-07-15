<!-- Form for users to create account -->
<div id="contentWrapper" class="content">
    <form id="createAccount" action="createAccount.php" method="post">
          
        <label for="nam">Name: </label>
        <input type="text" id="nam" name="name" value="<?= htmlspecialchars($name) ?>">
        <div id="nameError" class="error"><?= $errors['name'] ?? '' ?></div><br>
        
        <label for="email">E-mail: </label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
        <div id="emailError" class="error"><?= $errors['email'] ?? '' ?></div><br>

        <label for="phone">Phone Number: </label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>">
        <div id="phoneError" class="error"><?= $errors['phone'] ?? '' ?></div><br>

        <label for="password">Password: </label>
        <input type="text" id="password" name="password" value="<?= htmlspecialchars($password) ?>">
		<div id="passwordError" class="error"><?= $errors['password'] ?? '' ?></div><br>

        <input type="submit" value="Create Account">
    </form>
</div>
