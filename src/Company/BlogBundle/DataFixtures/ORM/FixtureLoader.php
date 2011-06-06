<?php

namespace Company\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Company\BlogBundle\Entity\Category;
use Company\BlogBundle\Entity\Post;
use Company\BlogBundle\Entity\Tag;
use Company\BlogBundle\Entity\User;
use Company\BlogBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class FixtureLoader implements FixtureInterface {

    public function load($manager) {
        // create the ROLE_ADMIN role
        $role = new Role();
        $role->setName('ROLE_ADMIN');

        $manager->persist($role);

        // create a user
        $user = new User();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('john@example.com');
        $user->setUsername('john.doe');
        $user->setSalt(md5(time()));

        // encode and set the password for the user,
        // these settings match our config
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);

        $user->getUserRoles()->add($role);

        $manager->persist($user);

        // create the tags
        $tag1 = new Tag();
        $tag1->setName('lorem');

        $manager->persist($tag1);
        $tag2 = new Tag();
        $tag2->setName('ipsum');

        $manager->persist($tag2);

        $cat1 = new Category();
        $cat1->setName('Programming');

        $manager->persist($cat1);

        // create 10 posts
        $tags = array($tag1, $tag2);
        for ($i = 0; $i < 10; ++$i) {
            $post = new Post();
            $post->setCategory($cat1);
            $post->setUser($user);
            $post->setTitle('Lorem Ipsum Dolor Sit Amet ' . $i);
            $post->setSlug('lorem-ipsum-dolor-sit-amet ' . $i);
            $post->setContent(
                    'Proin auctor augue enim? Integer adipiscing dolor odio proin? ' .
                    'In placerat arcu, turpis turpis et rhoncus? Et integer nascetur ' .
                    'arcu! Turpis scelerisque tincidunt proin mauris, dignissim duis ' .
                    'enim, ac sagittis auctor eu, ut penatibus nunc rhoncus magna ' .
                    'dignissim ut elementum est non! Urna scelerisque auctor, massa ' .
                    'turpis parturient, nisi, in tristique amet, lectus montes. ' .
                    'Facilisis, nunc? Diam ac, urna sed, sit magna turpis turpis ' .
                    'tincidunt porta. Tincidunt porta vut dis adipiscing phasellus, ' .
                    'a habitasse vut proin vel habitasse cras placerat, auctor, massa ' .
                    'ridiculus adipiscing ac duis a porta? Pulvinar in scelerisque, ' .
                    'adipiscing, arcu integer lorem odio est pellentesque adipiscing ' .
                    'velit. A, et porta, eros pulvinar! Nisi turpis mattis lundium ac ' .
                    'non nunc phasellus penatibus ut magna rhoncus dolor, lundium ultrices.'
            );

            $post->getTags()->add($tags[rand(0, 1)]);

            $manager->persist($post);
        }

        $manager->flush();
    }

}
