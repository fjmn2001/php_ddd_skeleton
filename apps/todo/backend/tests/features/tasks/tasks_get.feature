Feature: Obtain the total of tasks
  In order to have a tasks list
  As a user
  I want to see the tasks list

  Scenario: With one task
    Given I send a PUT request to "/tasks/1aab45ba-3c7a-4344-8936-78466eca77fb" with body:
    """
    {
      "name": "Clean the bedroom b"
    }
    """
    When I send a GET request to "/tasks"
    Then the response status code should be 200
    And the response content should be:
    """
    {
      "total": 1
    }
    """
