<div align="center">
   <?php
   if (isset($erreur)) {
      echo '<style color="red"' . $erreur . '</style>';
   }
   ?>
   <h2>Inscription</h2>
   <br />
   <form method="POST" action="/Joueur/signIn">
      <table>
         <tr>
            <td>
               <input type="text" placeholder="Votre pseudo" id="pseudo" name="username" value="" />
            </td>
         </tr>
         <tr>
            <td>
               <input type="email" placeholder="Votre mail" id="mail" name="email" value="" />
            </td>
         </tr>
         <tr>
            <td>
               <input type="password" placeholder="Votre mot de passe" id="password" name="password" />
            </td>
         </tr>
         <tr>
            <td>
               <input type="password" placeholder="Confirmation mot de passe" id="password2" name="password2" />
            </td>
         </tr>
         <tr>
            <td align="center">
               <input type="submit" name="forminscription" value="Je m'inscris" />
            </td>
         </tr>
      </table>
   </form>