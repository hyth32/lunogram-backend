<?php

namespace App\Http\Controllers;

use Application\DTOs\Post\PostDto;
use Application\Requests\BaseListRequest;
use Application\Requests\Post\StorePostRequest;
use Application\Interfaces\Services\IPostService;
use Application\Interfaces\Controllers\IPostController;

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
    public function index(BaseListRequest $request): array
    {
        return $this->postService->getList($request);
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
    public function store(StorePostRequest $request): array
    {
        $dto = PostDto::fromRequest($request);
        return $this->postService->storePost($request->user(), $dto);
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
