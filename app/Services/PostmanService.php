<?php

namespace App\Services;

use App\Repositories\ApiRepository;
use App\Repositories\DatasetRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class PostmanService
{

    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $api_repository;
    private $stringService;

    public function __construct(
        StringService $stringService,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository,
        ApiRepository $ApiRepository
    ) {
        $this->stringService = $stringService;
        $this->rallydata_repository = $RallydataRepository;
        $this->dataset_repository = $DatasetRepository;
        $this->resource_repository = $ResourceRepository;
        $this->api_repository = $ApiRepository;
    }

    private function _rawHandle($rallydata)
    {
        $raw = json_encode($rallydata, JSON_PRETTY_PRINT);
//        $raw = str_replace(',"', ",\n\t\"", $raw);
//        $raw = str_replace('{"', "{\n\t\"", $raw);
//        $raw = str_replace('"}', "\"\n\t}", $raw);
        return $raw;
    }

    private function _getItems($resources)
    {
        $data = [];
        foreach ($resources as $key => $resource) {
            if (!empty($resource['parents'])) {
                foreach ($resource['parents'] as $parent) {
                    $resources[$key][$parent]['fields'][] = [
                        "name" => $resource['name'],
                        "type" => "Resource",
                    ];
                }
            }
        }

        $headers = [
            [
                "key"   => "Accept",
                "value" => "application/json",
                "type"  => "text"
            ],
            [
                "key"   => "Authorization",
                "value" => "Bearer {{restful_token}}",
                "type"  => "text"
            ],
        ];
//        foreach ($resources as $resource) {
//            if ($this->resource_repository->checkAuthByResource($resource)) {
//                $headers[] = [
//                    "key"   => "{$resource['name']}_token",
//                    "value" => "Bearer {{{$resource['name']}_token}}",
//                    "type"  => "text"
//                ];
//            }
//        }

        foreach ($resources as $resource) {
            $items = [];
            $amounts = [];
            $amounts[$resource['id']] = 1;
            $rallydata = Arr::first($this->rallydata_repository->fillData($resource, $amounts, $resource['locale']));
// Auth
            if ($this->resource_repository->checkAuthByResource($resource)) {
                $authHeaders = [
                    [
                        "key"   => "Rallytoken",
                        "value" => "Bearer {{{$resource['name']}_token}}",
                        "type"  => "text"
                    ]
                ];
                $authHeaders = array_merge($headers, $authHeaders);

                $items[] = [
                    "name"     => "{{api_url}}/{$resource['name']}/auth-register",
                    "request"  => [
                        "method" => "POST",
                        "header" => $headers,
                        "body"   => [
                            "mode"    => "raw",
                            "raw"     => self::_rawHandle([
                                '_username' => 'tien.luckyfor@gmail.com',
                                '_password' => '12345678',
                            ]),
                            "options" => [
                                "raw" => [
                                    "language" => "json"
                                ]
                            ]
                        ],
                        "url"    => [
                            "raw"  => "{{api_url}}/{$resource['name']}/auth-register",
                            "host" => [
                                "{{api_url}}"
                            ],
                            "path" => [
                                $resource['name'],
                                "auth-register"
                            ]
                        ]
                    ],
                    "response" => []
                ];

                $items[] = [
                    "name"     => "{{api_url}}/{$resource['name']}/auth-login",
                    "request"  => [
                        "method" => "POST",
                        "header" => $headers,
                        "body"   => [
                            "mode"    => "raw",
                            "raw"     => self::_rawHandle([
                                '_username' => 'tien.luckyfor@gmail.com',
                                '_password' => '12345678',
                            ]),
                            "options" => [
                                "raw" => [
                                    "language" => "json"
                                ]
                            ]
                        ],
                        "url"    => [
                            "raw"  => "{{api_url}}/{$resource['name']}/auth-login",
                            "host" => [
                                "{{api_url}}"
                            ],
                            "path" => [
                                $resource['name'],
                                "auth-login"
                            ]
                        ]
                    ],
                    "response" => []
                ];

                $items[] = [
                    "name"     => "{{api_url}}/{$resource['name']}/auth",
                    "request"  => [
                        "method" => "GET",
                        "header" => $authHeaders,
                        "body"   => [
                            "mode"    => "raw",
                            "raw"     => self::_rawHandle([
                                '_username' => 'tien.luckyfor@gmail.com',
                                '_password' => '12345678',
                            ]),
                            "options" => [
                                "raw" => [
                                    "language" => "json"
                                ]
                            ]
                        ],
                        "url"    => [
                            "raw"  => "{{api_url}}/{$resource['name']}/auth",
                            "host" => [
                                "{{api_url}}"
                            ],
                            "path" => [
                                $resource['name'],
                                "auth"
                            ]
                        ]
                    ],
                    "response" => []
                ];
            }

            $data[] = [
                "name" => $resource['name'] . '/auth',
                "item" => $items,
            ];
// nFieldStr
            $nFields = array_map(function ($field) {
                return $field['name'];
            }, $resource['fields']);
            $nFieldStr = implode(',', $nFields);
            $items = [];

            foreach ($resource['endpoints'] as $endpoint) {
                if (!$endpoint['status']) {
                    continue;
                }

                switch ($endpoint['type']) {
                    case 'get_id':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}/1",
                            "request"  => [
                                "method" => "GET",
                                "header" => $headers,
                                "url"    => [
                                    "raw"   => "{{api_url}}/{$resource['name']}/1",
                                    "host"  => [
                                        "{{api_url}}"
                                    ],
                                    "path"  => [
                                        $resource['name'],
                                        1
                                    ],
                                    "query" => [
                                        [
                                            "key"      => "_system",
                                            "value"    => "",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"      => "_parent",
                                            "value"    => "",
                                            "disabled" => true
                                        ],
                                    ]
                                ]
                            ],
                            "response" => []
                        ];
                        break;
                    case 'get':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}",
                            "request"  => [
                                "method" => "GET",
                                "header" => $headers,
                                "url"    => [
                                    "raw"   => "{{api_url}}/{$resource['name']}?per_page=20&current_page=1&sort=id,desc&search=name,&fields={$nFieldStr}",
                                    "host"  => [
                                        "{{api_url}}"
                                    ],
                                    "path"  => [
                                        $resource['name']
                                    ],
                                    "query" => [
                                        [
                                            "key"   => "per_page",
                                            "value" => "20"
                                        ],
                                        [
                                            "key"   => "current_page",
                                            "value" => "1"
                                        ],
                                        [
                                            "key"      => "sort",
                                            "value"    => "id,desc",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"      => "search",
                                            "value"    => "name,",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"      => "parent",
                                            "value"    => "product_categories,1",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"   => "fields",
                                            "value" => $nFieldStr
                                        ],
                                        [
                                            "key"      => "_system",
                                            "value"    => "",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"      => "_parent",
                                            "value"    => "",
                                            "disabled" => true
                                        ],
                                    ]
                                ]
                            ],
                            "response" => []
                        ];
                        break;
                    case 'post':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}",
                            "request"  => [
                                "method" => "POST",
                                "header" => $headers,
                                "body"   => [
                                    "mode"    => "raw",
                                    "raw"     => self::_rawHandle($rallydata),
                                    "options" => [
                                        "raw" => [
                                            "language" => "json"
                                        ]
                                    ]
                                ],
                                "url"    => [
                                    "raw"  => "{{api_url}}/{$resource['name']}",
                                    "host" => [
                                        "{{api_url}}"
                                    ],
                                    "path" => [
                                        $resource['name']
                                    ]
                                ]
                            ],
                            "response" => []
                        ];
                        break;
                    case 'put':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}/{id}",
                            "request"  => [
                                "method" => "PUT",
                                "header" => $headers,
                                "body"   => [
                                    "mode"    => "raw",
                                    "raw"     => self::_rawHandle($rallydata),
                                    "options" => [
                                        "raw" => [
                                            "language" => "json"
                                        ]
                                    ]
                                ],
                                "url"    => [
                                    "raw"  => "{{api_url}}/{$resource['name']}/1",
                                    "host" => [
                                        "{{api_url}}"
                                    ],
                                    "path" => [
                                        $resource['name'],
                                        "1"
                                    ]
                                ]
                            ],
                            "response" => []
                        ];
                        break;
                    case 'delete_id':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}/{id}",
                            "request"  => [
                                "method" => "DELETE",
                                "header" => $headers,
                                "body"   => [
                                    "mode"    => "raw",
                                    "raw"     => "",
                                    "options" => [
                                        "raw" => [
                                            "language" => "json"
                                        ]
                                    ]
                                ],
                                "url"    => [
                                    "raw"  => "{{api_url}}/{$resource['name']}/1",
                                    "host" => [
                                        "{{api_url}}"
                                    ],
                                    "path" => [
                                        $resource['name'],
                                        "1"
                                    ]
                                ]
                            ],
                            "response" => []
                        ];
                        break;
                }
            }
            $data[] = [
                "name" => $resource['name'],
                "item" => $items,
            ];
        }
        return $data;
    }

    public function collection($datasetId)
    {
        $dataset = $this->dataset_repository->find($datasetId);
        $resources = $this->resource_repository
            ->getByDatasetId($datasetId, 'resources.*, datasets.locale')
            ->keyBy('id')
            ->toArray();
        $data = [
            "info" => [
                "_postman_id" => "09f6f992-168a-4aed-89a2-a1cf6b00166d",
                "name"        => $dataset->name,//['name'],
                "schema"      => "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
            ],
            "item" => self::_getItems($resources)
        ];
        return $data;
    }

    public function environment($datasetId)
    {
        $dataset = $this->dataset_repository->find($datasetId);
        $apiUrl = URL::to("/api/restful");
        $data = [
            "id"                      => "8d782980-878b-40ec-8c74-7f80aabca4f9",
            "name"                    => $dataset->name,//$dataset['name'],
            "values"                  => [
                [
                    "key"     => "api_url",
                    "value"   => $apiUrl,
                    "enabled" => true
                ],
                [
                    "key"     => "restful_token",
                    "value"   => $this->stringService->getToken($dataset->id, $dataset->user_id),
                    "enabled" => true
                ],
            ],
            "_postman_variable_scope" => "environment",
            "_postman_exported_at"    => Carbon::now(),
            "_postman_exported_using" => "Postman/8.0.10"
        ];
        $resources = $this->resource_repository->getByDatasetId($datasetId);
        $resources->map(function ($resource) use (&$data) {
            if ($this->resource_repository->checkAuthByResource($resource)) {
                $data['values'][] = [
                    "key"     => "{$resource['name']}_token",
                    "value"   => '',
                    "enabled" => true
                ];
            }
        });
        return $data;
    }

}
