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
        foreach ($resources as $resource) {
            $items = [];
            $amounts = [];
            $amounts[$resource['id']] = 1;
            $rallydata = Arr::first($this->rallydata_repository->fillData($resource, $amounts, $resource['locale']));
            foreach ($resource['endpoints'] as $endpoint) {
                if (!$endpoint['status']) {
                    continue;
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
                switch ($endpoint['type']) {
                    case 'get_id':
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}/1",
                            "request"  => [
                                "method" => "GET",
                                "header" => $headers,
                                "url"    => [
                                    "raw"  => "{{api_url}}/{$resource['name']}/1",
                                    "host" => [
                                        "{{api_url}}"
                                    ],
                                    "path" => [
                                        $resource['name'],
                                        1
                                    ],
                                    "query" => [
                                        [
                                            "key"      => "_system",
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
                        $fields = array_map(function ($field) {
                            return $field['name'];
                        }, $resource['fields']);
                        $fields = implode(',', $fields);
                        $items[] = [
                            "name"     => "{{api_url}}/{$resource['name']}",
                            "request"  => [
                                "method" => "GET",
                                "header" => $headers,
                                "url"    => [
                                    "raw"   => "{{api_url}}/{$resource['name']}?per_page=20&current_page=1&sort=id,desc&search=name,&fields={$fields}",
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
                                            "key"   => "sort",
                                            "value" => "id,desc"
                                        ],
                                        [
                                            "key"      => "search",
                                            "value"    => "name,",
                                            "disabled" => true
                                        ],
                                        [
                                            "key"   => "fields",
                                            "value" => $fields
                                        ],
                                        [
                                            "key"      => "_system",
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
                    "value"   => $this->stringService->JWT_encode([
                        'dataset_id' => $datasetId,
                        'user_id'    => $dataset->user_id
                    ]),
                    "enabled" => true
                ],
            ],
            "_postman_variable_scope" => "environment",
            "_postman_exported_at"    => Carbon::now(),
            "_postman_exported_using" => "Postman/8.0.10"
        ];
        return $data;
    }

}
