Feature: Obtain one task
  In order to have a task detail
  As a user
  I want to see the task detail

  Scenario: With one task
    Given I send a POST request to "/tasks" with body:
    """
    {
    "id": "1aab45ba-3c7a-4344-8936-78466eca77fb",
    "name": "Clean the bedroom b"
    }
    """
    When I send a GET request to "/tasks/1aab45ba-3c7a-4344-8936-78466eca77fb"
    Then the response status code should be 200
    And the response content should be:
    """
    {
        "id": "1aab45ba-3c7a-4344-8936-78466eca77fb",
        "name": "Clean the bedroom b"
    }
    """