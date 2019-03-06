<?php
	namespace App\Repository;

	use App\Entity\Busqueda;
	use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
	use Symfony\Bridge\Doctrine\RegistryInterface;

	class BusquedaRepository extends ServiceEntityRepository
	{
    	public function __construct(RegistryInterface $registry)
    	{
        	parent::__construct($registry, Busqueda::class);
    	}

    	/**
     	 * @param $curp
     	 * @return Busqueda[]
     	*/
    	public function findByCurp($curp): array {
       		$conn = $this->getEntityManager()->getConnection();

    		$sql = '
        		SELECT * FROM personal_bloqueado_promocion p
        		WHERE p.curp = :curp
        	';
    		$stmt = $conn->prepare($sql);
    		$stmt->execute(['curp' => $curp]);

    		// returns an array of arrays (i.e. a raw data set)
    		return $stmt->fetchAll();
    	}
	}