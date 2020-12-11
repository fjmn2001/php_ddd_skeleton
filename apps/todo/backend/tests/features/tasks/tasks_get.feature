Feature: Obtain the total of tasks
  In order to have a tasks list
  As a user
  I want to see the tasks list

  Scenario: With one task
    Given I send a POST request to "/tasks" with body:
    """
    {
    "id": "1aab45ba-3c7a-4344-8936-78466eca77fb",
    "name": "Clean the bedroom b"
    }
    """
    When I send a GET request to "/tasks"
    Then the response status code should be 200
    And the response content should be:
    """
    [
    {
        "id": "1aab45ba-3c7a-4344-8936-78466eca77fb",
        "name": "Clean the bedroom b"
    }
    ]
    """

    Given I send a POST request to "/tasks" with body:
    """
    {
    "id": "1aab45ba-3c7a-4344-8936-78466eca77fc",
    "name": "Clean the bedroom c"
    }
    """
    When I send a GET request to "/tasks"
    Then the response status code should be 200
    And the response content should be:
    """
    [
    {
        "id": "1aab45ba-3c7a-4344-8936-78466eca77fb",
        "name": "Clean the bedroom b"
    },
    {
        "id": "1aab45ba-3c7a-4344-8936-78466eca77fc",
        "name": "Clean the bedroom c"
    }
    ]
    """
    When I send a GET request to "/tasks" with body:
    """
    {
    "filters": [
        {
            "field": "name.value",
            "operator": "CONTAINS",
            "value": "the bedroom c"
        }
    ]
    }
    """
    Then the response status code should be 200
    And the response content should be:
    """
    [
    {
        "id": "1aab45ba-3c7a-4344-8936-78466eca77fc",
        "name": "Clean the bedroom c"
    }
    ]
    """
