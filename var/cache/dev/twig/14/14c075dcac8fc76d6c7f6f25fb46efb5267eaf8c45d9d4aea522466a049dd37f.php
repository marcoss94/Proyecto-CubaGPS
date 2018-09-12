<?php

/* base.html.twig */
class __TwigTemplate_de8842b3e65d73114abe5a8a546bda0e54ee1397b74dfe8554380fc47f8d9afc extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Cuba GPS - Oficial</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/vendor/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Custom fonts for this template -->
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/vendor/fontawesome-free/css/all.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,700\" rel=\"stylesheet\" type=\"text/css\">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/css/agency.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
</head>

<body id=\"page-top\">

<!-- Navigation -->
<nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\" id=\"mainNav\">
    <div class=\"container\">

        <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\"><img src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/logo.png"), "html", null, true);
        echo "\"
                                                                        width=\"170\" height=\"50\"
                                                                        class=\"d-inline-block align-top\" alt=\"\">
        </a>


        <button class=\"navbar-toggler navbar-toggler-right \" type=\"button\" data-toggle=\"collapse\"
                style=\"background-color: #f9b501\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            Menu
            <i class=\"fas fa-bars\"></i>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
            <ul class=\"navbar-nav text-uppercase ml-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#services\">Paquetes</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#portfolio\">Casas</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#about\">Excurciones</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#team\">Carros</a>
                </li>


                ";
        // line 63
        echo "
                ";
        // line 65
        echo "                ";
        // line 66
        echo "                ";
        // line 67
        echo "                ";
        // line 68
        echo "                ";
        // line 69
        echo "                ";
        // line 70
        echo "                ";
        // line 71
        echo "                ";
        // line 72
        echo "                ";
        // line 73
        echo "                ";
        // line 74
        echo "                ";
        // line 75
        echo "                ";
        // line 76
        echo "                <li class=\"nav-item\">
                    <div class=\"collapse navbar-collapse\" id=\"languageCollapse\">
                        <ul class=\"nav navbar-nav\">
                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle nav-link\" data-toggle=\"dropdown\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i><span
                                            class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\" role=\"menu\">
                                    <li id=\"spanish\" ><a ";
        // line 83
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 83, $this->source); })()), "session", array()), "get", array(0 => "language"), "method") == "es")) {
            echo " class=\"disabled\" ";
        }
        echo " href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_language");
        echo "\">Español</a></li>
                                    <li id=\"english\" ><a ";
        // line 84
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 84, $this->source); })()), "session", array()), "get", array(0 => "language"), "method") == "en")) {
            echo " class=\"disabled\" ";
        }
        echo " href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_language");
        echo "\">English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class=\"masthead\" style=\"margin-top: -6%\">
    <div class=\"container\">
        <div class=\"intro-text\">
            <div class=\"intro-lead-in\">";
        // line 99
        echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 99, $this->source); })()), "session", array()), "get", array(0 => "language"), "method") == "es")) ? ("Bienvenido") : ("Welcome"));
        echo "</div>
            <div class=\"intro-heading text-uppercase\">Le invitamos a descubrir Cuba</div>
            <a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" style=\"background-color: #f9b501;
border-color: #f9b501;\" href=\"#services\">Saber más</a>
        </div>
    </div>
</header>

<!-- Services -->
<section id=\"services\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Services</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row text-center\">
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-shopping-cart fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">E-Commerce</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-laptop fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">Responsive Design</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-lock fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">Web Security</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class=\"bg-light\" id=\"portfolio\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Ofertas</h2>
                <h3 class=\"section-subheading text-muted\">Cuba a tu alcance</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal1\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/01-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Threads</h4>
                    <p class=\"text-muted\">Illustration</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal2\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/02-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Explore</h4>
                    <p class=\"text-muted\">Graphic Design</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal3\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 193
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/03-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Finish</h4>
                    <p class=\"text-muted\">Identity</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal4\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/04-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Lines</h4>
                    <p class=\"text-muted\">Branding</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal5\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/05-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Southwest</h4>
                    <p class=\"text-muted\">Website Design</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal6\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"";
        // line 235
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/img/portfolio/06-thumbnail.jpg"), "html", null, true);
        echo "\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Window</h4>
                    <p class=\"text-muted\">Photography</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id=\"about\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">About</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <ul class=\"timeline\">
                    <li>
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/1.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>2009-2011</h4>
                                <h4 class=\"subheading\">Our Humble Beginnings</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/2.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>March 2011</h4>
                                <h4 class=\"subheading\">An Agency is Born</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/3.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>December 2012</h4>
                                <h4 class=\"subheading\">Transition to Full Service</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/4.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>July 2014</h4>
                                <h4 class=\"subheading\">Phase Two Expansion</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class=\"bg-light\" id=\"team\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Our Amazing Team</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/1.jpg\" alt=\"\">
                    <h4>Kay Garland</h4>
                    <p class=\"text-muted\">Lead Designer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/2.jpg\" alt=\"\">
                    <h4>Larry Parker</h4>
                    <p class=\"text-muted\">Lead Marketer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/3.jpg\" alt=\"\">
                    <h4>Diana Pertersen</h4>
                    <p class=\"text-muted\">Lead Developer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-8 mx-auto text-center\">
                <p class=\"large text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                    laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

<!-- Clients -->
<section class=\"py-5\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/envato.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/designmodo.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/themeforest.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/creative-market.jpg\" alt=\"\">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id=\"contact\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Contact Us</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <form id=\"contactForm\" name=\"sentMessage\" novalidate=\"novalidate\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"name\" type=\"text\" placeholder=\"Your Name *\"
                                       required=\"required\" data-validation-required-message=\"Please enter your name.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"email\" type=\"email\" placeholder=\"Your Email *\"
                                       required=\"required\"
                                       data-validation-required-message=\"Please enter your email address.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"phone\" type=\"tel\" placeholder=\"Your Phone *\"
                                       required=\"required\"
                                       data-validation-required-message=\"Please enter your phone number.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"form-group\">
                                <textarea class=\"form-control\" id=\"message\" placeholder=\"Your Message *\"
                                          required=\"required\"
                                          data-validation-required-message=\"Please enter a message.\"></textarea>
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"clearfix\"></div>
                        <div class=\"col-lg-12 text-center\">
                            <div id=\"success\"></div>
                            <button id=\"sendMessageButton\" class=\"btn btn-primary btn-xl text-uppercase\" type=\"submit\">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <span class=\"copyright\">Copyright &copy; Your Website 2018</span>
            </div>
            <div class=\"col-md-4\">
                <ul class=\"list-inline social-buttons\">
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-twitter\"></i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-facebook-f\"></i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class=\"col-md-4\">
                <ul class=\"list-inline quicklinks\">
                    <li class=\"list-inline-item\">
                        <a href=\"#\">Privacy Policy</a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->

<!-- Modal Registrate-->
<div class=\"portfolio-modal modal fade\" id=\"RegistrateModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/01-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal1\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/01-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal2\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/02-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Explore</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal3\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/03-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Finish</li>
                                <li>Category: Identity</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal4\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/04-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Lines</li>
                                <li>Category: Branding</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal5\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/05-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Southwest</li>
                                <li>Category: Website Design</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal6\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/06-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Window</li>
                                <li>Category: Photography</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src=\"";
        // line 818
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/vendor/jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 819
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/vendor/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>

<!-- Plugin JavaScript -->
<script src=\"";
        // line 822
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/vendor/jquery-easing/jquery.easing.min.js"), "html", null, true);
        echo "\"></script>

<!-- Contact form JavaScript -->
<script src=\"";
        // line 825
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/js/jqBootstrapValidation.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 826
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/contact_me.js"), "html", null, true);
        echo "\"></script>

<!-- Custom scripts for this template -->
<script src=\"";
        // line 829
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/js/agency.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    \$('#spanish').click(function () {
        ";
        // line 832
        $context["languaje"] = "es";
        echo ";
    })
    \$('#english').click(function () {
        ";
        // line 835
        $context["languaje"] = "en";
        echo ";
    })
</script>
</body>

</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  946 => 835,  940 => 832,  934 => 829,  928 => 826,  924 => 825,  918 => 822,  912 => 819,  908 => 818,  322 => 235,  305 => 221,  288 => 207,  271 => 193,  254 => 179,  237 => 165,  168 => 99,  146 => 84,  138 => 83,  129 => 76,  127 => 75,  125 => 74,  123 => 73,  121 => 72,  119 => 71,  117 => 70,  115 => 69,  113 => 68,  111 => 67,  109 => 66,  107 => 65,  104 => 63,  73 => 34,  61 => 25,  50 => 17,  44 => 14,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Cuba GPS - Oficial</title>

    <!-- Bootstrap core CSS -->
    <link href=\"{{ asset('build/vendor/bootstrap/css/bootstrap.min.css') }}\" rel=\"stylesheet\">

    <!-- Custom fonts for this template -->
    <link href=\"{{ asset('build/vendor/fontawesome-free/css/all.min.css') }}\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,700\" rel=\"stylesheet\" type=\"text/css\">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href=\"{{ asset('build/css/agency.min.css') }}\" rel=\"stylesheet\">
</head>

<body id=\"page-top\">

<!-- Navigation -->
<nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\" id=\"mainNav\">
    <div class=\"container\">

        <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\"><img src=\"{{ asset('build/img/logo.png') }}\"
                                                                        width=\"170\" height=\"50\"
                                                                        class=\"d-inline-block align-top\" alt=\"\">
        </a>


        <button class=\"navbar-toggler navbar-toggler-right \" type=\"button\" data-toggle=\"collapse\"
                style=\"background-color: #f9b501\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            Menu
            <i class=\"fas fa-bars\"></i>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
            <ul class=\"navbar-nav text-uppercase ml-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#services\">Paquetes</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#portfolio\">Casas</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#about\">Excurciones</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link js-scroll-trigger\" href=\"#team\">Carros</a>
                </li>


                {#El LOGIN lo dejamos para despues#}

                {#{% if app.user %}#}
                {#<li class=\"nav-item\">#}
                {#<a class=\"nav-link\" href=\"{{ path('security_logout') }}\">Logout</a>#}
                {#</li>#}
                {#{% elseif %}#}
                {#<li class=\"nav-item\">#}
                {#<a class=\"nav-link js-scroll-trigger\" href=\"#contact\">Regístrate</a>#}
                {#</li>#}
                {#<li class=\"nav-item\">#}
                {#<a class=\"nav-link js-scroll-trigger\" href=\"#contact\">Inicia sesión</a>#}
                {#</li>#}
                {#{% endif %}#}
                <li class=\"nav-item\">
                    <div class=\"collapse navbar-collapse\" id=\"languageCollapse\">
                        <ul class=\"nav navbar-nav\">
                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle nav-link\" data-toggle=\"dropdown\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i><span
                                            class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\" role=\"menu\">
                                    <li id=\"spanish\" ><a {% if app.session.get('language') == 'es'%} class=\"disabled\" {% endif %} href=\"{{ path('change_language') }}\">Español</a></li>
                                    <li id=\"english\" ><a {% if app.session.get('language') == 'en'%} class=\"disabled\" {% endif %} href=\"{{ path('change_language') }}\">English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class=\"masthead\" style=\"margin-top: -6%\">
    <div class=\"container\">
        <div class=\"intro-text\">
            <div class=\"intro-lead-in\">{{ app.session.get('language') == 'es'? 'Bienvenido':'Welcome' }}</div>
            <div class=\"intro-heading text-uppercase\">Le invitamos a descubrir Cuba</div>
            <a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" style=\"background-color: #f9b501;
border-color: #f9b501;\" href=\"#services\">Saber más</a>
        </div>
    </div>
</header>

<!-- Services -->
<section id=\"services\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Services</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row text-center\">
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-shopping-cart fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">E-Commerce</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-laptop fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">Responsive Design</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class=\"col-md-4\">
            <span class=\"fa-stack fa-4x\">
              <i class=\"fas fa-circle fa-stack-2x text-primary\"></i>
              <i class=\"fas fa-lock fa-stack-1x fa-inverse\"></i>
            </span>
                <h4 class=\"service-heading\">Web Security</h4>
                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class=\"bg-light\" id=\"portfolio\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Ofertas</h2>
                <h3 class=\"section-subheading text-muted\">Cuba a tu alcance</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal1\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/01-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Threads</h4>
                    <p class=\"text-muted\">Illustration</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal2\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/02-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Explore</h4>
                    <p class=\"text-muted\">Graphic Design</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal3\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/03-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Finish</h4>
                    <p class=\"text-muted\">Identity</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal4\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/04-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Lines</h4>
                    <p class=\"text-muted\">Branding</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal5\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/05-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Southwest</h4>
                    <p class=\"text-muted\">Website Design</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 portfolio-item\">
                <a class=\"portfolio-link\" data-toggle=\"modal\" href=\"#portfolioModal6\">
                    <div class=\"portfolio-hover\">
                        <div class=\"portfolio-hover-content\">
                            <i class=\"fas fa-plus fa-3x\"></i>
                        </div>
                    </div>
                    <img class=\"img-fluid\" src=\"{{ asset('build/img/portfolio/06-thumbnail.jpg') }}\" alt=\"\">
                </a>
                <div class=\"portfolio-caption\">
                    <h4>Window</h4>
                    <p class=\"text-muted\">Photography</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id=\"about\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">About</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <ul class=\"timeline\">
                    <li>
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/1.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>2009-2011</h4>
                                <h4 class=\"subheading\">Our Humble Beginnings</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/2.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>March 2011</h4>
                                <h4 class=\"subheading\">An Agency is Born</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/3.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>December 2012</h4>
                                <h4 class=\"subheading\">Transition to Full Service</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <img class=\"rounded-circle img-fluid\" src=\"img/about/4.jpg\" alt=\"\">
                        </div>
                        <div class=\"timeline-panel\">
                            <div class=\"timeline-heading\">
                                <h4>July 2014</h4>
                                <h4 class=\"subheading\">Phase Two Expansion</h4>
                            </div>
                            <div class=\"timeline-body\">
                                <p class=\"text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                    voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                                    vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class=\"timeline-inverted\">
                        <div class=\"timeline-image\">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class=\"bg-light\" id=\"team\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Our Amazing Team</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/1.jpg\" alt=\"\">
                    <h4>Kay Garland</h4>
                    <p class=\"text-muted\">Lead Designer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/2.jpg\" alt=\"\">
                    <h4>Larry Parker</h4>
                    <p class=\"text-muted\">Lead Marketer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"team-member\">
                    <img class=\"mx-auto rounded-circle\" src=\"img/team/3.jpg\" alt=\"\">
                    <h4>Diana Pertersen</h4>
                    <p class=\"text-muted\">Lead Developer</p>
                    <ul class=\"list-inline social-buttons\">
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-twitter\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-facebook-f\"></i>
                            </a>
                        </li>
                        <li class=\"list-inline-item\">
                            <a href=\"#\">
                                <i class=\"fab fa-linkedin-in\"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-8 mx-auto text-center\">
                <p class=\"large text-muted\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                    laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

<!-- Clients -->
<section class=\"py-5\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/envato.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/designmodo.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/themeforest.jpg\" alt=\"\">
                </a>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <a href=\"#\">
                    <img class=\"img-fluid d-block mx-auto\" src=\"img/logos/creative-market.jpg\" alt=\"\">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id=\"contact\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 text-center\">
                <h2 class=\"section-heading text-uppercase\">Contact Us</h2>
                <h3 class=\"section-subheading text-muted\">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <form id=\"contactForm\" name=\"sentMessage\" novalidate=\"novalidate\">
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"name\" type=\"text\" placeholder=\"Your Name *\"
                                       required=\"required\" data-validation-required-message=\"Please enter your name.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"email\" type=\"email\" placeholder=\"Your Email *\"
                                       required=\"required\"
                                       data-validation-required-message=\"Please enter your email address.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" id=\"phone\" type=\"tel\" placeholder=\"Your Phone *\"
                                       required=\"required\"
                                       data-validation-required-message=\"Please enter your phone number.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <div class=\"form-group\">
                                <textarea class=\"form-control\" id=\"message\" placeholder=\"Your Message *\"
                                          required=\"required\"
                                          data-validation-required-message=\"Please enter a message.\"></textarea>
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"clearfix\"></div>
                        <div class=\"col-lg-12 text-center\">
                            <div id=\"success\"></div>
                            <button id=\"sendMessageButton\" class=\"btn btn-primary btn-xl text-uppercase\" type=\"submit\">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                <span class=\"copyright\">Copyright &copy; Your Website 2018</span>
            </div>
            <div class=\"col-md-4\">
                <ul class=\"list-inline social-buttons\">
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-twitter\"></i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-facebook-f\"></i>
                        </a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class=\"col-md-4\">
                <ul class=\"list-inline quicklinks\">
                    <li class=\"list-inline-item\">
                        <a href=\"#\">Privacy Policy</a>
                    </li>
                    <li class=\"list-inline-item\">
                        <a href=\"#\">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->

<!-- Modal Registrate-->
<div class=\"portfolio-modal modal fade\" id=\"RegistrateModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/01-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal1\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/01-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal2\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/02-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Explore</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal3\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/03-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Finish</li>
                                <li>Category: Identity</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal4\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/04-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Lines</li>
                                <li>Category: Branding</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal5\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/05-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Southwest</li>
                                <li>Category: Website Design</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 -->
<div class=\"portfolio-modal modal fade\" id=\"portfolioModal6\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"close-modal\" data-dismiss=\"modal\">
                <div class=\"lr\">
                    <div class=\"rl\"></div>
                </div>
            </div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-8 mx-auto\">
                        <div class=\"modal-body\">
                            <!-- Project Details Go Here -->
                            <h2 class=\"text-uppercase\">Project Name</h2>
                            <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class=\"img-fluid d-block mx-auto\" src=\"img/portfolio/06-full.jpg\" alt=\"\">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class=\"list-inline\">
                                <li>Date: January 2017</li>
                                <li>Client: Window</li>
                                <li>Category: Photography</li>
                            </ul>
                            <button class=\"btn btn-primary\" data-dismiss=\"modal\" type=\"button\">
                                <i class=\"fas fa-times\"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src=\"{{ asset('build/vendor/jquery/jquery.min.js') }}\"></script>
<script src=\"{{ asset('build/vendor/bootstrap/js/bootstrap.bundle.min.js') }}\"></script>

<!-- Plugin JavaScript -->
<script src=\"{{ asset('build/vendor/jquery-easing/jquery.easing.min.js') }}\"></script>

<!-- Contact form JavaScript -->
<script src=\"{{ asset('build/js/jqBootstrapValidation.js') }}\"></script>
<script src=\"{{ asset('js/contact_me.js') }}\"></script>

<!-- Custom scripts for this template -->
<script src=\"{{ asset('build/js/agency.min.js') }}\"></script>
<script type=\"text/javascript\">
    \$('#spanish').click(function () {
        {%  set languaje = 'es' %};
    })
    \$('#english').click(function () {
        {%  set languaje = 'en' %};
    })
</script>
</body>

</html>
", "base.html.twig", "E:\\xamp\\htdocs\\zxccxz\\templates\\base.html.twig");
    }
}
