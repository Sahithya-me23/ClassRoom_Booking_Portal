document.addEventListener('DOMContentLoaded', function() {
    const showFormBtn = document.getElementById('showFormBtn');
    const formContainer = document.getElementById('formContainer');
    const itemForm = document.getElementById('itemForm');
    const cardsContainer = document.getElementById('cardsContainer');
    
    // Toggle form visibility
    showFormBtn.addEventListener('click', function() {
        formContainer.style.display = formContainer.style.display === 'block' ? 'none' : 'block';
    });
    
    // Add a new item
    itemForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const imageInput = document.getElementById('image');
        const description = document.getElementById('description').value;
        const year = document.getElementById('year').value;
        const section = document.getElementById('section').value;
        const classroom = document.getElementById('classroom').value;
        const contact = document.getElementById('contact').value;
        
        if (imageInput.files.length === 0) {
            alert('Please select an image file.');
            return;
        }
        
        // Create a FileReader to read the image file
        const reader = new FileReader();
        reader.onload = function(event) {
            // Create card with image data
            const card = document.createElement('div');
            card.classList.add('card');
            
            card.innerHTML = `
                <img src="${event.target.result}" alt="Item Image">
                <div class="card-content">
                    <h3>Description:</h3>
                    <p>${description}</p>
                    <h3>Year:</h3>
                    <p>${year}</p>
                    <h3>Section:</h3>
                    <p>${section}</p>
                    <h3>Classroom:</h3>
                    <p>${classroom}</p>
                    <h3>Contact:</h3>
                    <p>${contact}</p>
                    <button class="delete-btn">Delete</button>
                </div>
            `;
            
            // Add delete functionality
            card.querySelector('.delete-btn').addEventListener('click', function() {
                cardsContainer.removeChild(card);
            });
            
            // Add card to container
            cardsContainer.appendChild(card);
            
            // Clear form
            itemForm.reset();
            formContainer.style.display = 'none';
        };
        
        // Read the image file as a Data URL
        reader.readAsDataURL(imageInput.files[0]);
    });
});
