# features/test.feature
Feature: Test
  In order to understand how bInit works
  As a bInit user
  I want to execute a feature demonstration

  @wiki
  Scenario: Search for bdd on wikipedia
    #Given I am on "/"
    Given I go to wikipedia 
    When I fill in the following:
      |search|BDD|
    And I press "go"
    Then I should see "Behavior-driven development"