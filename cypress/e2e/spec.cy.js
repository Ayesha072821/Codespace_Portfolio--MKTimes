//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
  
  
  })
})



//Test to click the MKTimes button when user is not signed in

describe('Click the MKTimes button when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('.navbar-brand').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
  
  
  })
})



//Test to click to view Female collection when user is not signed in

describe('Click to view female collection when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#her').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
  
  
  })
}) 


//Test to click to view Male collection when user is not signed in

describe('Click to view Male collection when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#him').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
  
  
  })
})




//Test to click the Contact Us when user is not signed in

describe('Click to view Contact Page when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#contact').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
  
  
  })
})



//Test to click the the Our Collection in header and try to view Female collection  when user is not signed in

describe('Click to view Our Collection and try to view Female collection when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#navbarDarkDropdownMenuLink').click()
    cy.get('#herfromheader').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
  
  
  })
})



//Test to click the the Our Collection in header and try to view Male collection  when user is not signed in

describe('Click to view Our Collection in header and try to view Male collection when user not signed in', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#navbarDarkDropdownMenuLink').click()
    cy.get('#himfromheader').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
  
  
  })
})


//Test to click on The Registration page

describe('Click to view the registration Page', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  
  
  })
})



//triyng to fill in the registration form with wrong DOB

describe('Filling the First name field in Registration Fage', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
  //website Only Accepts 16 or MOre years old to register
  cy.get('#dateofbirth').type('2022-10-02')
  
  cy.get('#email').type('ayeshy19@gmail.com')
  cy.get('#password').type('shahwaiz')
  cy.get('#confirmpassword').type('shahwaiz')
  cy.get('#registeruser').click();

  //error should be update
  cy.get('#error').should('have.text','You should be 16 and older to register yourself')
  //wrong date of birth is entered and it will not go to next step
  cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  })
})


//triyng to fill in the registration form and wrong password length

describe('Filling the small password in Registration Fage', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
   cy.get('#dateofbirth').type('2002-10-02')
  
  cy.get('#email').type('ayeshy19@gmail.com')

  //passwords length should be more then 8 characters
  cy.get('#password').type('shah')
  cy.get('#confirmpassword').type('shah')
  cy.get('#registeruser').click();
  //error should be updated
  cy.get('#error').should('have.text','Password should be more then 8 characters long')
  // wrong password criteria will not take to next page
  cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  })
})



//triyng to fill in the registration form and wrong password length

describe('Filling the different password and confirm in Registration Fage', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
 cy.get('#dateofbirth').type('2001-10-02')
  
  cy.get('#email').type('ayeshy19@gmail.com')
  //passwords should be matching
  cy.get('#password').type('shahwaiz1')
  cy.get('#confirmpassword').type('shahwaiz')
  cy.get('#registeruser').click();

  //error should be updated
  cy.get('#error').should('have.text','Passwords do not match')
  //wrong password criteria and it will no go to next page
  cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  })
})

//triyng tto register with already existing email
describe('Testing To register with already registered email', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
  cy.get('#dateofbirth').type('2001-10-02')
  
  cy.get('#email').type('ayeshy19@gmail.com')
  cy.get('#password').type('shahwaiz')
  cy.get('#confirmpassword').type('shahwaiz')
  cy.get('#registeruser').click();
  //this email alreday exists in database and user will not get link to verify email
  cy.get('#err_msg').should('have.text','Please try Again')
   cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/user_registration.php')
  })
})




//Putting all the right Things and seeing if registration goes through
describe('Testing if Registration with new email works', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
  cy.get('#dateofbirth').type('2001-10-02')
  
  cy.get('#email').type('mktimestesting.email@gmail.com')
  cy.get('#password').type('shahwaiz')
  cy.get('#confirmpassword').type('shahwaiz')
  cy.get('#registeruser').click();
  //this email do not exists in database it should go to the next page
   cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/user_registration.php')

   cy.get('#verify_email').click()
   cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/verify_email.php')
   cy.pause()
   //here i pauses the testing because i get a code in email to register i add that and resume testing against it
   
   //i will enter the code i am getting in email manually and then go to next page and will resume the testing process

    //cy.get('#verify_email_button').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/verify_email_logic.php')
    cy.get('#log').click()
 //9ii9
 // cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

  })
})



