<?php
	namespace App\Repository;

	use App\Entity\Plaza;
	use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
	use Symfony\Bridge\Doctrine\RegistryInterface;

	class PlazaRepository extends ServiceEntityRepository
	{
    	public function __construct(RegistryInterface $registry)
    	{
        	parent::__construct($registry, Plaza::class);
    	}

    	/**
     	 * @param $curp
     	 * @return Plaza[]
     	*/
    	public function findByCurp($curp): array {
       		$conn = $this->getEntityManager()->getConnection();

    		$sql = '
        		SELECT  P.NO_PLAZA,
                        LPAD(P.CODIGO_PAGO,2,"0") AS CODIGO_PAGO,
                        LPAD(P.NO_UNIDAD,2,"0") AS NO_UNIDAD,
                        LPAD(P.NO_SUBUNIDAD,2,"0") AS NO_SUBUNIDAD,
                        P.NO_PUESTO,
                        CONCAT(LPAD(P.HORAS,2,"0"),".0") AS HORAS,
                        LPAD(P.NO_CONSECUTIVO,6,"0") AS NO_CONSECUTIVO,
                        N.DESCRIPCION,
                        P.CONDIGO_CONTRATACION,
                        P.FECHA_ANTIGUEDAD,
                        P.FECHA_INICIO,
                        P.FECHA_VENCIMIENTO,
                        P.CLAVE_AREA
                FROM plazas P,
                     nomina N,
                     personal PE
                WHERE P.NO_NOMINA = N.NO_NOMINA
                AND P.NO_PERSONAL = PE.NO_PERSONAL
                AND PE.CURP = :curp;
        	';
    		$stmt = $conn->prepare($sql);
    		$stmt->execute(['curp' => $curp]);

    		// returns an array of arrays (i.e. a raw data set)
    		return $stmt->fetchAll();
    	}
	}