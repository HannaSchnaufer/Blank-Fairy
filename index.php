<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

                <style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
}

main {
    width: 300px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

p {
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
    text-align: center;
}

.contact-form {
    display: flex;
    flex-direction: column;
}

.form-input, .form-textarea {
    background-color: #6a0dad;
    color: #fff;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1em;
}

.form-textarea {
    min-height: 100px;
    resize: vertical;
}

.form-button {
    background-color: #4a0c87;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

.form-button:hover {
    background-color: #5e0da6;
}

/*to lazy for css*/

        </style>
</head>
<body>
    <div>
        <div id="messageStatus"></div>
        <form onsubmit="savecontact(event)">
            <input type="text" name="nama" id="nama" placeholder="insert name here">
            <br>
            <input type="text" name="email" id="mail" placeholder="insert email here">
            <br>
            <input type="text" name="subjek" id="subjek" placeholder="isert subjek">
            <br>
            <textarea name="message" id="message" placeholder="insert message here"></textarea>
            <br>
            <button>Submit Message</button>
        </form>
    </div>
    <ul>
        <p id="nama1"></p>
        <p id="mail1"></p>
        <p id="subjek1"></p>
        <p id="message1"></p>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function savecontact(e) {
            e.preventDefault()
            axios.post('save-contact.php', {
                'nama': nama.value,
                'mail': mail.value,
                'subjek': subjek.value,
                'message': message.value
            }).then(function(response) {
                nama1.innerHTML = "<p>" + response.data[0]['nama']+ "</p>"
                mail1.innerHTML = "<p>" + response.data[0]['mail']+ "</p>"
                subjek1.innerHTML = "<p>" + response.data[0]['subjek']+ "</p>"
                message1.innerHTML = "<p>" + response.data[0]['message']+ "</p>"
            })
        }
    </script>
</body>
</html>