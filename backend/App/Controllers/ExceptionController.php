<?php

namespace App\Controllers;

use App\Exceptions\TestException;
use Exception;
use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Throwable;

final class ExceptionController
{
    public function test(Request $request, Response $response, array $args): Response
    {
        try {
            throw new TestException("Testando.");
            return $response->withJson(['msg' => 'ok']);
        } catch (TestException $ex) {
            return $response->withJson([
                'error' => TestException::class,
                'status' => 400,
                'code' => '006',
                'userMessage' => "Erro tratado pela aplicação!",
                'developerMessage' => $ex->getMessage()
            ], 400);
        } catch (\InvalidArgumentException $ex) {
            return $response->withJson([
                'error' => \InvalidArgumentException::class,
                'status' => 200,
                'code' => '001',
                'userMessage' => "OK",
                'developerMessage' => $ex->getMessage()
            ], 200);
        } catch (\Exception | \Throwable $ex) {
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 401,
                'code' => '002',
                'userMessage' => "Não autenticado",
                'developerMessage' => $ex->getMessage()
            ], 401);
        } catch (\Exception | \Throwable $ex) {
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 400,
                'code' => '003',
                'userMessage' => "Erro tratado pela aplicação",
                'developerMessage' => $ex->getMessage()
            ], 400);
        } catch (\Exception | \Throwable $ex) {
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 404,
                'code' => '004',
                'userMessage' => "Rota não encontrada",
                'developerMessage' => $ex->getMessage()
            ], 404);
        } catch (\Exception | \Throwable $ex) {
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 500,
                'code' => '005',
                'userMessage' => "Erro não previsto",
                'developerMessage' => $ex->getMessage()
            ], 500);
        }
    }
}
