<!--<link href="footer.css" rel="stylesheet">-->
<head>
    <style>
    footer {
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: space-between;
    user-select: none;
    padding-left: 5%;
    padding-right: 5%;
    border-top: 1px solid lightgrey;
    }

    .company_logo img {
        width: 200px; /* Ensure the image takes up the full width of its container */
        height: auto; /* Maintain aspect ratio */
    }

    .title_text {
        font-size: 20px;
        color: black;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .follow_us i {
        margin: 5px; /* Add spacing between the icons */
    }

    .info p {
        margin-bottom: 5px;
    }
</style>
</head>
<body>
<footer style="background-image: url(headerbanner.jpg);">
    <div class="company_logo" style="width: 10%; margin-right: 3%;">
        <img src="logoblack.png" alt="Company Logo" height="230px" width="500px">
    </div>
    <div class="info">
        <p class="title_text"><b>Info</b></p>
        <p style="color: grey">
            <a href="privacy.php">Privacy Policy</a> ♦ 
            <a href="#">Terms and Conditions</a> ♦ 
            <a href="#">Shipping and Return Policy</a>
        </p>
    </div>
    <div class="follow_us">
        <p class="title_text"><b>Follow Us</b></p>
        <div class="follow_icons">
            <a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.google.com/" target="blank"><i class="fab fa-google" aria-hidden="true"></i></a>
            <a href="https://twitter.com/i/flow/login" target="blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.pinterest.com/login/" target="blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/" target="blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
        </div>
    </div>
</footer>
</body>