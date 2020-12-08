Feature: Create a new task
  In order to have tasks on the platform
  I want to create a new task

  Scenario: A valid non existing task
    Given I send a POST request to "/tasks" with body:
    """
    {
    "id": "1aab45ba-3c7a-4344-8936-78466eca77aa",
    "name": "Task from behat"
    }
    """
    Then the response status code should be 201
    And the response should be empty