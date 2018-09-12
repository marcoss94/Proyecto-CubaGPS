<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

        }

        // homepage
        if (preg_match('#^/(?P<_locale>en|fr|de|es|cs|nl|ru|uk|ro|pt_BR|pl|it|ja|id|ca|sl|hr|zh_CN)?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'homepage')), array (  'template' => 'default/homepage.html.twig',  '_locale' => 'en',  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',));
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/admin')) {
                if (0 === strpos($pathinfo, '/admin/p')) {
                    if (0 === strpos($pathinfo, '/admin/post')) {
                        // admin_index
                        if ('/admin/post' === $trimmedPathinfo) {
                            $ret = array (  '_controller' => 'App\\Controller\\Admin\\BlogController::index',  '_route' => 'admin_index',);
                            if ('/' === substr($pathinfo, -1)) {
                                // no-op
                            } elseif ('GET' !== $canonicalMethod) {
                                goto not_admin_index;
                            } else {
                                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_index'));
                            }

                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_admin_index;
                            }

                            return $ret;
                        }
                        not_admin_index:

                        // admin_post_index
                        if ('/admin/post' === $trimmedPathinfo) {
                            $ret = array (  '_controller' => 'App\\Controller\\Admin\\BlogController::index',  '_route' => 'admin_post_index',);
                            if ('/' === substr($pathinfo, -1)) {
                                // no-op
                            } elseif ('GET' !== $canonicalMethod) {
                                goto not_admin_post_index;
                            } else {
                                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_post_index'));
                            }

                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_admin_post_index;
                            }

                            return $ret;
                        }
                        not_admin_post_index:

                        // admin_post_new
                        if ('/admin/post/new' === $pathinfo) {
                            $ret = array (  '_controller' => 'App\\Controller\\Admin\\BlogController::new',  '_route' => 'admin_post_new',);
                            if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                                $allow = array_merge($allow, array('GET', 'POST'));
                                goto not_admin_post_new;
                            }

                            return $ret;
                        }
                        not_admin_post_new:

                        // admin_post_show
                        if (preg_match('#^/admin/post/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_show')), array (  '_controller' => 'App\\Controller\\Admin\\BlogController::show',));
                            if (!in_array($canonicalMethod, array('GET'))) {
                                $allow = array_merge($allow, array('GET'));
                                goto not_admin_post_show;
                            }

                            return $ret;
                        }
                        not_admin_post_show:

                        // admin_post_edit
                        if (preg_match('#^/admin/post/(?P<id>\\d+)/edit$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_edit')), array (  '_controller' => 'App\\Controller\\Admin\\BlogController::edit',));
                            if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                                $allow = array_merge($allow, array('GET', 'POST'));
                                goto not_admin_post_edit;
                            }

                            return $ret;
                        }
                        not_admin_post_edit:

                        // admin_post_delete
                        if (preg_match('#^/admin/post/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_post_delete')), array (  '_controller' => 'App\\Controller\\Admin\\BlogController::delete',));
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_admin_post_delete;
                            }

                            return $ret;
                        }
                        not_admin_post_delete:

                    }

                    // process_area
                    if ('/admin/process_area' === $pathinfo) {
                        return array (  '_controller' => 'App\\Controller\\AreaController::processArea',  '_route' => 'process_area',);
                    }

                    // process_user
                    if ('/admin/process_user' === $pathinfo) {
                        return array (  '_controller' => 'App\\Controller\\UserController::process_user',  '_route' => 'process_user',);
                    }

                }

                // create_area
                if ('/admin/create_area' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\AreaController::createAreas',  '_route' => 'create_area',);
                }

                // create_user
                if ('/admin/create_user' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\UserController::createUser',  '_route' => 'create_user',);
                }

                // ajax_check_areaname
                if ('/admin/ajax_check_areaname' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\AreaController::checkAreaName',  '_route' => 'ajax_check_areaname',);
                }

                // ajax_check_username
                if ('/admin/ajax_check_username' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\UserController::checkUserName',  '_route' => 'ajax_check_username',);
                }

                // delete_user
                if ('/admin/delete_user' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\UserController::delete_user',  '_route' => 'delete_user',);
                }

            }

            // area
            if ('/areas' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\AreaController::areas',  '_route' => 'area',);
            }

            // ajax_check_registered
            if ('/ajax_check_registered' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\SecurityController::checkRegistered',  '_route' => 'ajax_check_registered',);
            }

        }

        elseif (0 === strpos($pathinfo, '/blog')) {
            // blog_index
            if ('/blog' === $trimmedPathinfo) {
                $ret = array (  'page' => '1',  '_format' => 'html',  '_controller' => 'App\\Controller\\BlogController::index',  '_route' => 'blog_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_blog_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'blog_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_blog_index;
                }

                return $ret;
            }
            not_blog_index:

            // blog_rss
            if ('/blog/rss.xml' === $pathinfo) {
                $ret = array (  'page' => '1',  '_format' => 'xml',  '_controller' => 'App\\Controller\\BlogController::index',  '_route' => 'blog_rss',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_blog_rss;
                }

                return $ret;
            }
            not_blog_rss:

            // blog_index_paginated
            if (0 === strpos($pathinfo, '/blog/page') && preg_match('#^/blog/page/(?P<page>[1-9]\\d*)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_index_paginated')), array (  '_format' => 'html',  '_controller' => 'App\\Controller\\BlogController::index',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_blog_index_paginated;
                }

                return $ret;
            }
            not_blog_index_paginated:

            // blog_post
            if (0 === strpos($pathinfo, '/blog/posts') && preg_match('#^/blog/posts/(?P<slug>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_post')), array (  '_controller' => 'App\\Controller\\BlogController::postShow',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_blog_post;
                }

                return $ret;
            }
            not_blog_post:

            // change_language
            if ('/blog/blog_languaje' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\BlogController::changeLanguaje',  '_route' => 'change_language',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_change_language;
                }

                return $ret;
            }
            not_change_language:

            // comment_new
            if (0 === strpos($pathinfo, '/blog/comment') && preg_match('#^/blog/comment/(?P<postSlug>[^/]++)/new$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'comment_new')), array (  '_controller' => 'App\\Controller\\BlogController::commentNew',));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_comment_new;
                }

                return $ret;
            }
            not_comment_new:

            // blog_search
            if ('/blog/search' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\BlogController::search',  '_route' => 'blog_search',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_blog_search;
                }

                return $ret;
            }
            not_blog_search:

            // test
            if ('/blog/test' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\BlogController::test',  '_route' => 'test',);
            }

        }

        // date
        if ('/date' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\DateController::index',  '_route' => 'date',);
        }

        if (0 === strpos($pathinfo, '/report')) {
            // report
            if ('/report' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\ReportController::index',  '_route' => 'report',);
            }

            // reportbase
            if ('/reportbase' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\ReportController::base',  '_route' => 'reportbase',);
            }

            // reportuser
            if ('/reportuser' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\ReportController::user',  '_route' => 'reportuser',);
            }

        }

        // register_sistem
        if ('/register_sistem' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\SecurityController::registerSistem',  '_route' => 'register_sistem',);
        }

        // security_login
        if ('/login' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\SecurityController::login',  '_route' => 'security_login',);
        }

        // security_logout
        if ('/logout' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\SecurityController::logout',  '_route' => 'security_logout',);
        }

        // users
        if ('/site/users' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\UserController::users',  '_route' => 'users',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
