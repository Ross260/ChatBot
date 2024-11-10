// Fonction pour envoyer le message
function sendMessage() {
    const inputField = document.getElementById("user-input");
    const message = inputField.value.trim();

    if (message === "") return;

    addMessage(message, "user");
    inputField.value = "";

    setTimeout(() => {
        getBotResponse(message);
    }, 500);
}

// Fonction pour ajouter les messages dans la boîte de chat
function addMessage(message, sender) {
    const chatBox = document.getElementById("chat-box");
    const messageContainer = document.createElement("div");
    messageContainer.classList.add(sender + "-message");

    const messageElement = document.createElement("p");
    messageElement.innerText = message;
    messageContainer.appendChild(messageElement);

    chatBox.appendChild(messageContainer);
    chatBox.scrollTop = chatBox.scrollHeight; // Scroll vers le bas
}

// Fonction pour répondre en fonction du message de l'utilisateur
function getBotResponse(message) {
    let botMessage = "Je ne comprends pas, pouvez-vous reformuler ?";

    if (message.toLowerCase().includes("bonjour")) {
        botMessage = "Bonjour ! Comment ça va ?";
    } else if (message.toLowerCase().includes("ça va")) {
        botMessage = "Content de l'entendre ! Comment puis-je vous aider ?";
    } else if (message.toLowerCase().includes("merci")) {
        botMessage = "Avec plaisir !";
    }

    addMessage(botMessage, "bot");
}

// Fonction pour détecter la touche 'Enter' pour envoyer le message
function checkEnter(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}
