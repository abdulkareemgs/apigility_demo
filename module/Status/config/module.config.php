<?php
return array(
    'controllers' => array(
        'factories' => array(
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Status\\V1\\Rpc\\Ping\\PingControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'status.rpc.ping' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ping',
                    'defaults' => array(
                        'controller' => 'Status\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ),
                ),
            ),
            'status.rest.campaign' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/campaign[/:campaign_id]',
                    'defaults' => array(
                        'controller' => 'Status\\V1\\Rest\\Campaign\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'status.rpc.ping',
            1 => 'status.rest.campaign',
        ),
    ),
    'zf-rpc' => array(
        'Status\\V1\\Rpc\\Ping\\Controller' => array(
            'service_name' => 'Ping',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'status.rpc.ping',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Json',
            'Status\\V1\\Rest\\Campaign\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Status\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'Status\\V1\\Rest\\Campaign\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Status\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ),
            'Status\\V1\\Rest\\Campaign\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Status\\V1\\Rpc\\Ping\\Controller' => array(
            'input_filter' => 'Status\\V1\\Rpc\\Ping\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Status\\V1\\Rpc\\Ping\\Validator' => array(
            0 => array(
                'name' => 'ack',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Acknowledge the request with a timestamp',
            ),
        ),
    ),
    'zf-rest' => array(
        'Status\\V1\\Rest\\Campaign\\Controller' => array(
            'listener' => 'Status\\V1\\Rest\\Campaign\\CampaignResource',
            'route_name' => 'status.rest.campaign',
            'route_identifier_name' => 'campaign_id',
            'collection_name' => 'campaign',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Status\\V1\\Rest\\Campaign\\CampaignEntity',
            'collection_class' => 'Status\\V1\\Rest\\Campaign\\CampaignCollection',
            'service_name' => 'campaign',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Status\\V1\\Rest\\Campaign\\CampaignEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.campaign',
                'route_identifier_name' => 'campaign_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Status\\V1\\Rest\\Campaign\\CampaignCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.campaign',
                'route_identifier_name' => 'campaign_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'Status\\V1\\Rest\\Campaign\\CampaignResource' => array(
                'adapter_name' => 'DB/RTE',
                'table_name' => 'campaign',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Status\\V1\\Rest\\Campaign\\Controller',
                'entity_identifier_name' => 'id',
            ),
        ),
    ),
);
