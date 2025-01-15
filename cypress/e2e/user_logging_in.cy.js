//This test if user can correctly log in using right credentials

//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website and try to log in with wrong credentials', () => {
  it('passes', () => {
    
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
    

    //we are entering rigt email and right password
    cy.get('#user_email').type('ayeshy19@gmail.com')

    cy.get('#user_password').type('shahwaizaslam')
    cy.get('#log_in').click()


    // if user logs in successfully it will take to index page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    
  
  })
})