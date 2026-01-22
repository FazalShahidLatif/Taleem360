<?php
/*
Template Name: Contact
*/

get_header();
?>

<div class="contact-form">
    <h2>Contact Us</h2>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone"><br><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

<div class="contact-info">
    <h3>Contact Information</h3>
    <p>Office Address: 1234 Example St, City, Country</p>
    <p>Email: info@example.com</p>
    <p>Phone: (123) 456-7890</p>
</div>

<?php
get_footer();
?>