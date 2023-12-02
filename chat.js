document.addEventListener("DOMContentLoaded", function () {
    const replyButtons = document.querySelectorAll(".reply-button");
    const messageInput = document.getElementById("message");

    // Store the original message separately
    let originalMessage = "";
    let originalUserName = "";

    replyButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const messageContainer = button.closest(".message-container");
            originalUserName = messageContainer.querySelector("strong").textContent;
            originalMessage = messageContainer.querySelector(".message").textContent
                .replace(originalUserName + ":", "")
                .trim();

            // Populate the message input box with the username and indication of a reply
            messageInput.value = `Replying to ${originalMessage}.... Reply:`;
            // Focus on the message input box to allow typing
            messageInput.focus();
        });
    });

    // Add an event listener for when the user types in the message input
    messageInput.addEventListener("input", function () {
        // Check if the "Replying to" tag is already in the message
        if (!messageInput.value.startsWith(`Replying to ${originalUserName}:`)) {
            // Append the original message for the reply
            messageInput.value = `${messageInput.value}`;
        }
    });
});


