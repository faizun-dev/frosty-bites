window.onload = function() {
    // Get elements by class name
    let features = document.getElementsByClassName('feature');
    let teamCards = document.getElementsByClassName('team-card');
    let orderButton = document.querySelector('.order-button');
    let cupcakeItems = document.getElementsByClassName('cupcake-item');
    let orderNowBtns = document.getElementsByClassName('order-now-btn');

    // Add effects to features
    for(let i = 0; i < features.length; i++) {
        // When mouse moves over feature
        features[i].onmouseover = function() {
            this.style.backgroundColor = '#fff9fb';
        }
        
        // When mouse leaves feature
        features[i].onmouseout = function() {
            this.style.backgroundColor = 'white';
        }
        
        // When feature is clicked
        features[i].onclick = function() {
            let emoji = this.getElementsByClassName('feature-emoji')[0];
            emoji.style.fontSize = '3.5rem';
            
            // Return to normal size after 1 second
            setTimeout(function() {
                emoji.style.fontSize = '3rem';
            }, 1000);
        }
    }

    // Add effects to team cards
    for(let i = 0; i < teamCards.length; i++) {
        // When mouse moves over team card
        teamCards[i].onmouseover = function() {
            this.style.backgroundColor = '#fff9fb';
        }
        
        // When mouse leaves team card
        teamCards[i].onmouseout = function() {
            this.style.backgroundColor = 'white';
        }
        
        // When team card is clicked
        teamCards[i].onclick = function() {
            let emoji = this.getElementsByClassName('team-emoji')[0];
            emoji.style.transform = 'rotate(360deg)';
            emoji.style.transition = 'transform 1s';
            
            // Return to normal position after animation
            setTimeout(function() {
                emoji.style.transform = 'rotate(0deg)';
            }, 1000);
        }
    }

    // Add effect to order button
    if(orderButton) {
        orderButton.onclick = function() {
            this.style.backgroundColor = '#ff4757';
            this.innerText = 'Ordering...';
            
            // Return to normal after 1 second
            setTimeout(function() {
                orderButton.style.backgroundColor = '#ff69b4';
                orderButton.innerText = 'Order Now';
            }, 1000);
        }
    }

    // Add effects to cupcake items
    for(let i = 0; i < cupcakeItems.length; i++) {
        orderNowBtns[i].onclick = function() {
            this.style.backgroundColor = '#ff4757';
            this.innerText = 'Added to Cart!';
            
            // Return to normal after 1 second
            setTimeout(() => {
                this.style.backgroundColor = '#ff69b4';
                this.innerText = 'Order Now';
            }, 1000);
        }
    }
} 