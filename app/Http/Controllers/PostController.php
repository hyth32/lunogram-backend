<?php

namespace App\Http\Controllers;

use Application\Interfaces\Controllers\IPostController;
use Application\Interfaces\Services\IPostService;

class PostController extends Controller implements IPostController
{
    public function __construct(
        private readonly IPostService $postService,
    ) {}

    /**
     * @OA\Get(path="/posts",
     *      tags={"Post"},
     *      summary="Список постов",
     *      @OA\Response(response=200, description="Ответ",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema(),
     *          )
     *      )
     * )
     */
    public function index(): array
    {
        return $this->postService->getList();
    }

    /**
     * @OA\Post(path="/posts",
     *      tags={"Post"},
     *      summary="Сохранение поста",
     *      @OA\RequestBody(description="Запрос",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema(),
     *          )
     *      ),
     *      @OA\Response(response=200, description="Ответ",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema(),
     *          )
     *      )
     * )
     */
    public function store(): array
    {
        return $this->postService->storePost();
    }

    /**
     * @OA\Get(path="/posts/{post}",
     *      tags={"Post"},
     *      summary="Получение поста",
     *      @OA\Response(response=200, description="Ответ",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema(),
     *          )
     *      )
     * )
     */
    public function show(): array
    {
        return $this->postService->showPost();
    }

    /**
     * @OA\Delete(path="/posts/{post}",
     *      tags={"Post"},
     *      summary="Удаление поста",
     *      @OA\Response(response=200, description="Ответ",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema(),
     *          )
     *      )
     * )
     */
    public function destroy(): array
    {
        return $this->postService->destroyPost();
    }
}
