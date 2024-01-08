<?php

/*
 * Base Controller
 * Loads the models and views
 */

class Controller
{
    /**
     * Load model.
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php'; // Require model file
        return new $model(); // Instantiate model
    }

    /**
     * Load view.
     * @param $view
     * @param $data
     * @return void
     */
    public function view($view, $data = [])
    {
        if (file_exists(__DIR__ . '/../../resources/views/' . $view . '.php')) { // Check for view file
            require_once __DIR__ . '/../../resources/views/' . $view . '.php';
        } else {
            // die('View does not exist');
            echo "View does not exist";
        }
    }

    protected function handleResponse($data, $msg, $code = 200, $total = 0, $length = 0, $key = '')
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $msg,
            'total' => $total,
            'length' => $length,
            'key' => $key,
        ];
    }

    protected function handleError($error, $errorData = [], $code = 200, $key = '')
    {
        $response = [
            'success' => false,
            'message' => $error,
            'key' => $key
        ];

        if (!empty($errorData)) {
            $response['data'] = $errorData;
        }
    }
}
