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



//triyng to fill in the registration form

describe('Filling the First name field in Registration Fage', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.get('#register').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  cy.get('#firstname').type('ayesha')
  cy.get('#lastname').type('yousaf')
  
  //website Only Accepts 16 or MOre years old to register
  cy.get('#dateofbirth').type('2022-10-02')
  
  cy.get('#email').type('ayeshy19@gamil.com')
  cy.get('#password').type('shahwaiz')
  cy.get('#confirmpassword').type('shahwaiz')
  cy.get('#register').click();
  cy.get('#error').debug().should('have.html', 'You should be 16 and older to register yourself');
  //cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')
  
  
  })
})


