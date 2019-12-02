<?php
	class Pdf {
		private $base_url = "http://localhost/pdf4you/covers" ;

		private $idPdf ;
		private $imgPortada ;
		private $infoPdf ;
		private $nombrePdf ;
		private $downloadPdf ;
		private $premium ;

		public function __construct() { }
	    /**
	     * @return mixed
	     */
	    public function getIdPdf() {
	      return $this->idPdf;
	    }

	    /**
	     * @param mixed $idPdf
	     *
	     * @return self
	     */
	    public function setIdPdf($idPdf) {
	      $this->idPdf = $idPdf;
	      return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getImgPortada()
	    {
	        return $this->base_url.$this->imgPortada;
	    }

	    /**
	     * @param mixed $imgPortada
	     *
	     * @return self
	     */
	    public function setImgPortada($imgPortada)
	    {
	        $this->imgPortada = $imgPortada;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getInfoPdf()
	    {
	        return $this->infoPdf;
	    }

	    /**
	     * @param mixed $poster
	     *
	     * @return self
	     */
	    public function setInfoPdf($infoPdf)
	    {
	        $this->infoPdf = $infoPdf;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNombrePdf() {
	        return $this->nombrePdf;
	    }

	    /**
	     * @param mixed $nombrePdf
	     *
	     * @return self
	     */
	    public function setNombrePdf($nombrePdf) {
	        $this->nombrePdf = $nombrePdf;
	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDownloadPdf() {
	        return $this->downloadPdf;
	    }

	    /**
	     * @param mixed $downloadPdf
	     *
	     * @return self
	     */
	    public function setDownloadPdf($downloadPdf)
	    {
	        $this->downloadPdf = $downloadPdf;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPremium()
	    {
	        return $this->premium;
	    }

	    /**
	     * @param mixed $premium
	     *
	     * @return self
	     */
	    public function setPremium($premium)
	    {
	        $this->premium = $premium;

	        return $this;
	    }
}