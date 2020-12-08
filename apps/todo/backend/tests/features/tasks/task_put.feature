Feature: Update a task
  In order to can update tasks on the platform
  I want to create a new task and update it

  Scenario: A valid non existing task
    Given I send a POST request to "/tasks" with body:
    """
    {
    "id": "1aab45ba-3c7a-4344-8936-78466eca77aa",
    "name": "Clean the bedroom"
    }
    """
    Then the response status code should be 201
    And the response should be empty

    Then I send a PUT request to "/tasks/1aab45ba-3c7a-4344-8936-78466eca77aa" with body:
    """
    {
    "name": "Clean the bedroom updated"
    }
    """
    Then the response status code should be 200
    And the response should be empty
